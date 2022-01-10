<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventMail;
use Carbon\Carbon;

class EventUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an event reminder to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $events = Event::all();

        foreach($events as $event){
            $eventDateTime = Carbon::parse($event->date .' '. $event->time);
            $createdDateTime = $event->created_at;
            $currentDateTime = Carbon::now();    

            if(($eventDateTime->diffInHours($createdDateTime) >= 24) && ($eventDateTime->diffInHours($currentDateTime) == 24)){
                $users = User::all();
                foreach($users as $user){
                    $name = $user->name;
                    $email = $user->email;
                    $mailInfo = [
                        'date' => $event->date,
                        'time' => $event->time,
                        'title' => $event->title,
                        'name' => $name,
                    ];
    
                    Mail::to($email)->send(new EventMail($mailInfo));
                }               
            }            
        }
        $this->info('Update has been send successfully');
        return 0;
    }
}
