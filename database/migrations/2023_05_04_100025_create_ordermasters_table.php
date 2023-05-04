<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdermastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermasters', function (Blueprint $table) {
            $table->id();
            // $table->integer('customer_id');
            // $table->integer('seller_id');
            // $table->integer('payment_method_id');
            // $table->integer('total_qty');
            // $table->integer('total_price');
            // $table->integer('total_amount');
            $table->string('country');
            $table->string('fname');
            $table->string('lname');
            $table->string('companyname');
            $table->string('address');
            $table->string('state');
            $table->integer('zip_code');
            $table->integer('email');
            $table->integer('phone');
            $table->string('comments');
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
        Schema::dropIfExists('ordermasters');
    }
}
