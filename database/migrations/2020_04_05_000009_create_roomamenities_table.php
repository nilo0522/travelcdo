<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomamenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('roomamenities', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->unsignedBigInteger('amenities_id');
            $table->unsignedBigInteger('room_id');
            $table->timestamps();
             
            $table->foreign('room_id')
                  ->references('id')->on('rooms')
                  ->onDelete('cascade');
            $table->foreign('amenities_id')
                  ->references('id')->on('amenities')
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
        Schema::dropIfExists('roomamenities');
    }
}
