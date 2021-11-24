<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->integer('user_id')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('trans_id')->nullable();
            $table->date('subscription_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('is_expired')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
