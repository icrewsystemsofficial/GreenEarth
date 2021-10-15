<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClearAllWHOISCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:whois';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all locally saved whois cache';

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
        activity()->log('Deleting WHOIS Cache from terminal');
        Storage::deleteDirectory('public/whois');
    }
}
