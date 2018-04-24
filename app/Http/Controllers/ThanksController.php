<?php
/**
 * Created by PhpStorm.
 * User: marzioperez
 * Date: 14/02/18
 * Time: 00:44
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ThanksController extends  Controller
{

    public function __construct(){
    }

    public function send_mail(Request $request){
        $data = $request->all();
        $lang = $data["lang"];
        $name = $data["nombre"];

        $destinatarios = $data["dest"];
        $emails = explode(",", $destinatarios);
        foreach ($emails as $email){
            Mail::to(trim($email))->send(new \App\Mail\Thanks($lang, $name));
        }
        return response()->json($emails);
    }

}