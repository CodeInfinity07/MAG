<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('album_id')->nullable()->index('audio_album_id_foreign');
            $table->text('song');
            $table->timestamps();
            $table->boolean('is_set_audio')->nullable()->default(false);
            $table->string('song_name')->nullable();
            $table->integer('song_track_number')->nullable();
            $table->string('duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio');
    }
}
