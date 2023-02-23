<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_type');
            $table->integer('room_price');
            $table->integer('room_person');
            $table->string('room_image');
            $table ->integer('room_qty');
            $table ->integer('room_qty_left');
             $table->timestamps();
             $table->unsignedBigInteger('hotel_id');
            
            $table->foreign('hotel_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('rooms');
    }
}
