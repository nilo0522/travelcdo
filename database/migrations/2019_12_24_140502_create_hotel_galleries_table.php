<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->string('image');
           $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('hd_id');
            $table->foreign('hotel_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('hd_id')
                  ->references('id')->on('hotel_details')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_galleries');
    }
}
