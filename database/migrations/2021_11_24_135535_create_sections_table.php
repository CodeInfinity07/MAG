<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('account_id')->default(0);
            $table->integer('distribution')->nullable()->default(0);
            $table->integer('discography')->nullable()->default(0);
            $table->integer('promotions')->nullable()->default(0);
            $table->integer('label_artist')->nullable()->default(0);
            $table->integer('mailing')->nullable()->default(0);
            $table->integer('katorz')->nullable()->default(0);
            $table->timestamps();
            $table->integer('user_id')->default(0);
            $table->boolean('releases')->default(false);
            $table->boolean('data_feeds')->default(false);
            $table->boolean('groups')->default(false);
            $table->boolean('reporting')->default(false);
            $table->boolean('accounting')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
