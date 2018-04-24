<?php
/**
 * Created by PhpStorm.
 * User: marzioperez
 * Date: 27/01/18
 * Time: 18:54
 */

namespace App\Http\Controllers;
use App\Models\Donation;
use App\User;
use \Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Stripe\Stripe;

class AdminController extends  Controller
{

    var $params = array(
        "testmode" => "on",
        "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
        "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
        "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
        "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
    );

    public function __construct(){
    }

    public function login(){
        return view('admin/login');
    }

    public function logout(){
        Session::flush();
        return redirect('/admin');
    }

    public function donations(){
        $token = Session::get("token");
        if(count($token) <= 0){
            return redirect('/admin');
        }else{
            $donations = Donation::all();
            return view("admin/donations", compact('donations'));
        }
    }

    public function donation(Request $request){
        $token = Session::get("token");
        if(count($token) <= 0){
            $response['status'] = 'error';
            $response['error'] = ['codigo'=> 'Error', 'mensaje'=>'Usuario no autorizado'];
            return response()->json($response,401);
        }else{
            $id = $request->input("id");
            $donation["donation"] = Donation::where("id", $id)->first();
            $donation["status"] = "success";
            return response()->json($donation);
        }
    }

    public function cancel_suscription(Request $request){
        $id = $request->input("id");
        $donation = Donation::where("id", $id)->first();
        $subscription_stripe_id = $donation->subscription_stripe_id;

        if ($this->params["testmode"] == "on"){
            Stripe::setApiKey($this->params["private_test_key"]);
            $pubkey = $this->params["public_test_key"];
        }else{
            Stripe::setApiKey($this->params["private_live_key"]);
            $pubkey = $this->params["public_live_key"];
        }

        $subscription = \Stripe\Subscription::retrieve($subscription_stripe_id);
        $subscription->cancel();

        Donation::where("id", $id)->update(["status" => "cancelada"]);

        return response()->json(["status" => "success"]);
    }

    public function authenticate(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where("email", $request->input("email"))->first();
        if (Hash::check($request->input("password"), $user->password)){
            $apiToken = Hash::make(str_random(40));

            User::where('email', $request->input('email'))->update(['api_token' => $apiToken]);
            $response['data'] = ['email'=>$user->email, 'api_token'=> $apiToken];
            $response['status'] = 'ok';

            $request->session()->push("token", $apiToken);

            return response()->json($response);
        }else{
            $response['status'] = 'error';
            $response['error'] = ['codigo'=> 'Fallo de login', 'mensaje'=>'Usuario no autorizado'];
            return response()->json($response);
        }
    }

}