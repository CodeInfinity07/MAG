<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('seller_name');
            $table->string('seller_email');
            $table->string('number');
            $table->string('CNIC');
            $table->string('CNIC_copy');
            $table->string('shop_name');
            $table->string('shop_address');
            $table->string('shop_image');
            $table->string('shop_proof');
            $table->string('email');
            $table->string('password');
            $table->string('verified')->default('0');
            $table->string('blocked')->default('0');
            $table->string('city')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
