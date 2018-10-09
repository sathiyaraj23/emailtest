<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Profiles;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class send_email_notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:email_notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Email to Members';

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
     * @return mixed
     */
    public function handle()
    {
        $profiles = new Profiles();        

        $profiles->mailAlert(); 
    
    }
}
