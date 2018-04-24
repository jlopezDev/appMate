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

class DonationShipped extends Mailable {

    use Queueable, SerializesModels;
    public $donation;
    public $lang;

    public function  __construct(Donation $donation, $lang) {
        $this->donation = $donation;
        $this->lang = $lang;
    }

    public function build(){
        if($this->lang == "es"){
            $subject = "Gracias por tu donación";
            return $this->view('mail/donation-shipped')
                ->subject($subject);
        }else{
            $subject = "Thanks to your donation";
            return $this->view('mail/donation-shipped-en')
                ->subject($subject);
        }

    }

}