<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table ->bigIncrements('id');
            $table ->unsignedBigInteger('cus_id');
            $table ->unsignedBigInteger('hotel_id');
            $table ->unsignedBigInteger('room_id');
            $table ->string('book_status');
            $table ->integer('night');
            $table ->string('check_in');
            $table ->string('check_out');
            $table ->integer('price');
            $table ->integer('qty');
            $table ->integer('total');
            $table->timestamps();
             $table->foreign('room_id')
                  ->references('id')->on('rooms')
                  ->onDelete('cascade');
            $table->foreign('cus_id')
                  ->references('id')->on('customers')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
