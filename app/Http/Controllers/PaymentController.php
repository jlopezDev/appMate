<?php
/**
 * Created by PhpStorm.
 * User: marzioperez
 * Date: 20/01/18
 * Time: 15:06
 */

namespace App\Http\Controllers;


use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use Stripe\Stripe;

/**
 * @property  params
 */
class PaymentController extends  Controller
{

    public function __construct(){
    }

    var $params = array(
        "testmode" => "on",
        "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
        "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
        "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
        "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
    );


    public function index(){
        return view('payment-form');
    }

    public function existCustomer($email){
        $params = array(
            "testmode" => "on",
            "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
            "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
            "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
            "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
        );

        if ($params["testmode"] == "on"){
            Stripe::setApiKey($params["private_test_key"]);
        }else{
            Stripe::setApiKey($params["private_live_key"]);
        }

        $customers = \Stripe\Customer::all();
        $exists = false;
        foreach ($customers["data"] as $customer){
            if ($customer["email"] == $email){
                $exists = true;
            }
        }
        return $exists;
    }

    public function getCustomerId($email){
        $params = array(
            "testmode" => "on",
            "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
            "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
            "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
            "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
        );

        if ($params["testmode"] == "on"){
            Stripe::setApiKey($params["private_test_key"]);
        }else{
            Stripe::setApiKey($params["private_live_key"]);
        }

        $customers = \Stripe\Customer::all();
        $customer_id = null;
        foreach ($customers["data"] as $customer){
            if ($customer["email"] == $email){
                $customer_id = $customer["id"];
            }
        }
        return $customer_id;
    }

    public function existPlan($interval, $amount){
        $params = array(
            "testmode" => "on",
            "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
            "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
            "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
            "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
        );

        if ($params["testmode"] == "on"){
            Stripe::setApiKey($params["private_test_key"]);
        }else{
            Stripe::setApiKey($params["private_live_key"]);
        }

        $plans = \Stripe\Plan::all(array("limit" => 1000));
        $exists = false;
        foreach ($plans["data"] as $plan){
            if ($plan["interval"] == $interval && $plan["amount"] == $amount . "00"){
                $exists = true;
            }
        }
        return $exists;
    }

    public function getPlanId($interval, $amount){
        $params = array(
            "testmode" => "on",
            "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
            "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
            "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
            "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
        );

        if ($params["testmode"] == "on"){
            Stripe::setApiKey($params["private_test_key"]);
        }else{
            Stripe::setApiKey($params["private_live_key"]);
        }

        $plans = \Stripe\Plan::all(array("limit" => 1000));
        $plan_id = null;
        foreach ($plans["data"] as $plan){
            if ($plan["interval"] == $interval && $plan["amount"] == $amount . "00"){
                $plan_id = $plan["id"];
            }
        }
        return $plan_id;
    }

    public function store(Request $request){
        $data = $request->all();

        $params = array(
            "testmode" => "on",
            "private_live_key" => "sk_live_qv2tH2zgNOdFyQ1GsrSkMDZJ",
            "public_live_key"  => "pk_live_3Leu9MQCabsxVTLUC7hCqt9f",
            "private_test_key" => "sk_test_JR0KBywWSF6oIxzSvx6rQLml",
            "public_test_key"  => "pk_test_1O6uqaX8dvZOvee1QX0Zz0sU"
        );

        if ($params["testmode"] == "on"){
            Stripe::setApiKey($params["private_test_key"]);
            $pubkey = $params["public_test_key"];
        }else{
            Stripe::setApiKey($params["private_live_key"]);
            $pubkey = $params["public_live_key"];
        }

        if ($request->has("stripeToken")){
            $description = "Donación de: " . $data["first_name"] . " " . $data["last_name"];
            $subscription_stripe_id = null;
            $customer_stripe_id = null;
            try{
                if ($data["recurrent"] == "si") {
                    if ($data["recurrent_mode"] == "anual") {
                        $exists_plan = $this->existPlan("year", $data["amount"]);
                        if (!$exists_plan){
                            $plan = \Stripe\Plan::create([
                                "currency" => "usd",
                                "interval" => "year",
                                "name" => "Plan Anual " . $data["amount"],
                                "amount" => $data["amount"] . "00",
                                "id" => "yearly-" . $data["amount"]
                            ]);
                            $plan_id = $plan["id"];
                        }else{
                            $plan_id = $this->getPlanId("year", $data["amount"]);
                        }
                    } else {
                        $exists_plan = $this->existPlan("month", $data["amount"]);
                        if (!$exists_plan){
                            $plan = \Stripe\Plan::create([
                                "currency" => "usd",
                                "interval" => "month",
                                "name" => "Plan Mensual " . $data["amount"],
                                "amount" => $data["amount"] . "00",
                                "id" => "monthly-" . $data["amount"]
                            ]);
                            $plan_id = $plan["id"];
                        }else{
                            $plan_id = $this->getPlanId("month", $data["amount"]);
                        }
                    }

                    $exists_customer = $this->existCustomer($data["email"]);
                    if (!$exists_customer){
                        $customer = \Stripe\Customer::create([
                            "email" => $data["email"],
                            "description" => $data["first_name"] . " " . $data["last_name"],
                            "source" => $data["stripeToken"]
                         ]);
                        $customer_stripe_id = $customer["id"];
                    }else{
                        $customer_stripe_id = $this->getCustomerId($data["email"]);
                    }
                        
                    $suscription = \Stripe\Subscription::create([
                        "customer" => $customer_stripe_id,
                        "items" => [["plan" => $plan_id]]
                    ]);
                    $subscription_stripe_id = $suscription["id"];
                    if($suscription["status"] == "active"){
                        $resp["status"] = "success";
                        $resp["token"] = $data["stripeToken"];
                    }else{
                        $resp["status"] = "error";
                    }
                }else{
                    $charge = \Stripe\Charge::create(array(
                        "amount" => $data["amount"] . "00",
                        "currency" => "usd",
                        "source" => $data["stripeToken"],
                        "description" => $description)
                    );
                    if($charge["status"] == "succeeded"){
                        $resp["status"] = "success";
                        $resp["token"] = $data["stripeToken"];
                    }else{
                        $resp["status"] = "error";
                    }
                }

                $donation = Donation::create([
                    'first_name' => $data["first_name"],
                    'last_name' => $data["last_name"],
                    'country' => $data["country"],
                    'address' => $data["address"],
                    'province' => $data["province"],
                    'zip_code' => $data["zip_code"],
                    'cell_phone' => $data["cell_phone"],
                    'email' => $data["email"],
                    'recurrent' => $data["recurrent"],
                    'recurrent_mode' => $data["recurrent_mode"],
                    'amount' => $data["amount"],
                    'subscription_stripe_id' => $subscription_stripe_id,
                    'customer_stripe_id' => $customer_stripe_id,
                    'stripe_token' => $data["stripeToken"]
                ]);
                if ($resp["status"] == "success"){
                    $this->send_mail($donation, $data["lang"]);
                }
                return response()->json($resp);

            } catch (Exception $e){
                return response()->json($e->getMessage());
            }
        }
    }

    public function mail_tmp1(){
        return view('mail/thanks-email');
    }

    public function send_mail(Donation $donation, $lang){
        Mail::to($donation->email)->send(new \App\Mail\DonationShipped($donation, $lang));
    }

    public function cancel_suscription($token){
        if ($this->params["testmode"] == "on"){
            Stripe::setApiKey($this->params["private_test_key"]);
            $pubkey = $this->params["public_test_key"];
        }else{
            Stripe::setApiKey($this->params["private_live_key"]);
            $pubkey = $this->params["public_live_key"];
        }

        $subscription = \Stripe\Subscription::retrieve($token);
        $subscription->cancel();

        Donation::where("subscription_stripe_id", $token)
            ->update(["status" => "cancelada"]);
        return view('cancel');
    }

    public function thanks($token){
        return view('thanks', compact('token'));
    }

    public function thanks_en($token){
        return view('thanks-en', compact('token'));
    }

    public function certificado($token){
        $donation = Donation::where("stripe_token", $token)->first();
        $fpdf = new \FPDF();
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'B', 23);
        $fpdf->Ln(0, 20);
        $fpdf->SetXY(15, 50);
        $fpdf->Image(storage_path() . '/logo.png', 165, 20, 20);
        $fpdf->Cell(0, 0, 'RECIBO DE PAGO', 0, 0);
        $fpdf->SetXY(15, 58);
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->Cell(0, 0, $donation["first_name"] . ' ' . $donation["last_name"], 0, 0);

        $fpdf->SetXY(120, 50);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, 'FECHA DE PAGO', 0, 0);

        $fpdf->SetXY(120, 55);
        $fpdf->SetFont('Arial', '', 10);
        $payment_date = date("d/m/Y H:i", strtotime($donation["created_at"]));
        $fpdf->Cell(0, 0, $payment_date, 0, 0);

        $fpdf->SetXY(165, 48);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, 'Museo MATE US Inc', 0, 0);

        $fpdf->SetXY(165, 52);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, '723 Superba Avenue', 0, 0);

        $fpdf->SetXY(165, 56);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, 'Venice', 0, 0);

        $fpdf->SetXY(165, 60);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, 'Los Angeles', 0, 0);

        $fpdf->SetXY(165, 64);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, 'California 90291', 0, 0);

        $fpdf->SetXY(165, 68);
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(0, 0, 'USA', 0, 0);

        $fpdf->SetXY(131, 95);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, 'Monto total', 0, 0);

        $fpdf->SetXY(184, 95);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, "$" . $donation["amount"], 0, 0);

        $fpdf->SetXY(15, 112);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, utf8_decode('Descripción'), 0, 0);

        $fpdf->SetXY(105, 112);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, 'Cantidad de impuestos', 0, 0);

        $fpdf->SetXY(15, 125);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, 'Cantidad de impuestos', 0, 0);

        $fpdf->SetXY(184, 125);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, "$" . $donation["amount"], 0, 0);

        $fpdf->SetXY(184, 135);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, "$" . $donation["amount"], 0, 0);

        $fpdf->SetXY(141, 135);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Cell(0, 0, 'Total', 0, 0);

        $fpdf->Line(15, 98, 220 - 20, 98);
        $fpdf->Line(15, 118, 220 - 20, 118);
        $fpdf->Line(15, 128, 220 - 20, 128);
        $fpdf->Line(140, 138, 220 - 20, 138);

        $fpdf->Output();
    }

}