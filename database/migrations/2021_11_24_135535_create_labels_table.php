<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('account_id')->nullable()->default(0);
            $table->integer('artist_many')->nullable();
            $table->integer('parent_label')->nullable()->default(0);
            $table->string('label_name')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('beatport')->nullable();
            $table->string('traxsource')->nullable();
            $table->string('website')->nullable();
            $table->string('my_space')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('sound_cloud')->nullable();
            $table->string('genre_1')->nullable();
            $table->string('genre_2')->nullable();
            $table->integer('compilations_label')->nullable()->default(0);
            $table->text('biography')->nullable();
            $table->timestamps();
            $table->enum('compete_status', ['Yes', 'No'])->default('No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
