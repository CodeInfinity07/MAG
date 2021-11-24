<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_releases', function (Blueprint $table) {
            $table->integer('release_id');
            $table->string('artist_name');
            $table->string('artist_genre');
            $table->timestamps();
            $table->integer('id', true);
            $table->string('artist_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_releases');
    }
}
