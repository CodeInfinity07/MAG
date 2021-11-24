<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('label_id')->nullable()->default(0);
            $table->string('name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('telephone', 50)->nullable();
            $table->string('image')->nullable();
            $table->text('biography')->nullable();
            $table->integer('release_feed')->nullable()->default(0);
            $table->integer('artist_feed')->nullable()->default(0);
            $table->string('building_name_no')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('town')->nullable();
            $table->string('post_code')->nullable();
            $table->string('county')->nullable();
            $table->string('country', 50)->nullable();
            $table->string('apple_music_profile')->nullable();
            $table->string('apple_music_URL')->nullable();
            $table->string('facebook')->nullable();
            $table->string('sound_cloud')->nullable();
            $table->string('spotify_profile')->nullable();
            $table->string('spotify_URL')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('artists');
    }
}
