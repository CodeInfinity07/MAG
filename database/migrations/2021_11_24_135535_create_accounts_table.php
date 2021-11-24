<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->default(0);
            $table->integer('role_id')->nullable()->default(0);
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('account_type')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('building_name_no')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('town')->nullable();
            $table->string('county')->nullable();
            $table->string('post_code')->nullable();
            $table->string('country')->nullable();
            $table->integer('update_logo')->default(0);
            $table->integer('show_feedback')->default(0);
            $table->string('sections')->nullable();
            $table->string('facebook')->nullable();
            $table->string('my_space')->nullable();
            $table->string('sound_cloud')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->text('biography')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
