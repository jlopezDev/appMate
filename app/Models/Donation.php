<?php
/**
 * Created by PhpStorm.
 * User: marzioperez
 * Date: 22/01/18
 * Time: 23:44
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model {

    protected $table = "donations";
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'address',
        'province',
        'zip_code',
        'cell_phone',
        'email',
        'recurrent',
        'recurrent_mode',
        'subscription_stripe_id',
        'customer_stripe_id',
        'amount',
        'stripe_token'
    ];

}