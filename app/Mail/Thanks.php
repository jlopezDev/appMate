<?php

/**
 * Created by PhpStorm.
 * User: marzioperez
 * Date: 26/01/18
 * Time: 10:02 AM
 */

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Thanks extends Mailable {

    use Queueable, SerializesModels;
    public $name;
    public $lang;

    public function  __construct($lang, $name) {
        $this->lang = $lang;
        $this->name = $name;
    }

    public function build(){
        $name = $this->name;
        if($this->lang == "es"){
            $subject = "Colabora tú también";
            return $this->view('mail/thanks-email', compact('name'))
                ->subject($subject);
        }else{
            $subject = "Get involved";
            return $this->view('mail/thanks-email-en', compact('name'))
                ->subject($subject);
        }

    }

}