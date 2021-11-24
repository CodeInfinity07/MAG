<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csv_uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('distributor')->nullable();
            $table->bigInteger('upc')->nullable();
            $table->string('cat_no')->nullable();
            $table->string('isrc')->nullable();
            $table->string('label')->nullable();
            $table->string('release_title')->nullable();
            $table->string('track_title')->nullable();
            $table->string('mix_name')->nullable();
            $table->string('artist')->nullable();
            $table->string('content_type')->nullable();
            $table->string('delivery_method')->nullable();
            $table->string('territory')->nullable();
            $table->string('suite_beats_comp')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->double('revenue', 8, 2)->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->string('username')->nullable();
            $table->date('upload_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csv_uploads');
    }
}
