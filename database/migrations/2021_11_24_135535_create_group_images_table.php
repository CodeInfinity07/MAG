<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->string('img5')->nullable();
            $table->string('img6')->nullable();
            $table->string('img7')->nullable();
            $table->integer('group_id')->nullable();
            $table->timestamps();
            $table->text('slide1')->nullable();
            $table->text('slide2')->nullable();
            $table->text('slide3')->nullable();
            $table->text('slide4')->nullable();
            $table->text('slide5')->nullable();
            $table->text('slide6')->nullable();
            $table->text('slide7')->nullable();
            $table->text('slideAll')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_images');
    }
}
