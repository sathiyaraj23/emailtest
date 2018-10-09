<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use Mail;

class Profiles extends Controller
{
    public $csv_file;

    public function mailAlert()
    {
        $To = ['sathiya@empoweredmargins.com'];
        $this->csv_file = storage_path('app/output/').'Recertication_Members.csv';
        $csv_file = ($this->csv_file != '')?$this->csv_file:false;

        $subject =' IAAP - Recertification Members List ';

        Mail::send('emails.send',['title' => $subject], function ($m) use ($To, $csv_file, $subject){
      
            if($csv_file){
                
                echo "-- Attach CSV --";
                $m->attach($csv_file);
            }

            $m->from('certification@iaap-hq.org', 'Certication');
            $m->to($To)->subject($subject);
        });
   
    }

}
