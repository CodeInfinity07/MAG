<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title');
            $table->string('language');
            $table->string('content');
            $table->string('p_genre');
            $table->string('s_genre');
            $table->string('record');
            $table->string('c_year');
            $table->integer('r_year')->nullable();
            $table->string('c_license');
            $table->string('r_license')->nullable();
            $table->date('original_release');
            $table->date('pre_order')->nullable();
            $table->date('sales')->nullable();
            $table->boolean('version');
            $table->timestamps();
            $table->string('is_compilation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('releases');
    }
}
