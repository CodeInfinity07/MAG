<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->integer('id', true);
            $table->boolean('release')->default(false);
            $table->boolean('audio')->default(false);
            $table->boolean('artwork')->default(false);
            $table->boolean('store')->default(false);
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->boolean('need_action')->nullable()->default(false);
            $table->boolean('in_review')->nullable()->default(true);
            $table->boolean('is_approved')->nullable()->default(false);
            $table->boolean('is_removed')->nullable()->default(false);
            $table->boolean('is_pending')->nullable()->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
