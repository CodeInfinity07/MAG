<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->integer('parent_label')->nullable();
            $table->string('username');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->nullable();
            $table->string('country')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('contact_no', 225)->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->default('Y');
            $table->string('payment_method')->nullable();
            $table->longText('picture')->nullable();
            $table->longText('notes')->nullable();
            $table->bigInteger('artist_many')->nullable()->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->string('verification_code')->nullable();
            $table->string('account_id')->nullable();
            $table->enum('account_type', ['free', 'premium', 'partner']);
            $table->string('premium_label_id');
            $table->boolean('custom_settings')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
