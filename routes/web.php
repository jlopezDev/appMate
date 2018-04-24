<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return view('payment-form');
});

$router->get('/es', function () use ($router) {
    return view('payment-form');
});

$router->get('/en', function () use ($router) {
    return view('payment-form-en');
});

$router->post("payment/store", "PaymentController@store");
$router->get("thanks/{token}", "PaymentController@thanks");
$router->get("thanks/es/{token}", "PaymentController@thanks");
$router->get("thanks/en/{token}", "PaymentController@thanks_en");
$router->get("certificado/{token}", "PaymentController@certificado");
$router->get("cancel-suscription/{token}", "PaymentController@cancel_suscription");
$router->get("sendmail", "PaymentController@send_mail");

$router->get("mail_1", "PaymentController@mail_tmp1");

$router->post("thanks/participate", "ThanksController@send_mail");

$router->get("admin", "AdminController@login");
$router->get("logout", "AdminController@logout");
$router->post("admin/authenticate", "AdminController@authenticate");
$router->get("donations", "AdminController@donations");
$router->post("donation", "AdminController@donation");
$router->post("donation/cancel", "AdminController@cancel_suscription");