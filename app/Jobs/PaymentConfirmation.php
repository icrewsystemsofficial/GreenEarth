<?php

namespace App\Jobs;

use App\Mail\PaymentConfirmationMail;
use App\Mail\SendCertificateMail;
use App\Models\User;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PaymentConfirmation implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $payment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Send an email with payment details, transaction ID , Payment mode, Amount , Transaction Date
//        uncomment this code
        $email = new PaymentConfirmationMail($this->payment); // payment confirmation email
        Mail::to($this->payment['email'])->send($email);

        $certificateMail = new SendCertificateMail($this->payment);//certificate email;
        Mail::to($this->payment['email'])->send($certificateMail);

    }

//    public function failed()
//    {
        //Todo: send notifications to the admin

//        $users = User::role('superadmin')->get();
//
//        foreach ($users as $user) {
//            // notifiy the superadmin about the errors
//        }
//    }
}
