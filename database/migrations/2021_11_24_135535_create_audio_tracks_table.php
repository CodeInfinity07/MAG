<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_tracks', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->string('track_id');
            $table->string('track_name');
            $table->string('track_genre');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('audio_id')->nullable();
            $table->integer('track_record_id')->nullable();
            $table->string('track_artist_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_tracks');
    }
}
