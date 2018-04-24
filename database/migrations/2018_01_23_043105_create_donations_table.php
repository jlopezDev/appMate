<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('address');
            $table->string('province');
            $table->string('zip_code');
            $table->string('cell_phone');
            $table->string('email');
            $table->string('recurrent')->nullable();
            $table->string('recurrent_mode')->nullable();
            $table->string('subscription_stripe_id')->nullable();
            $table->string('customer_stripe_id')->nullable();
            $table->double('amount');
            $table->string('stripe_token')->nullable();
            $table->string('status')->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
