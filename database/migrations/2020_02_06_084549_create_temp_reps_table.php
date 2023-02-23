<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempRepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_reps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table ->string('Guest');
            $table ->string('ResDate');
            $table ->string('Accomodation');
            $table ->string('Night');
            $table ->string('RoomQty');
            $table ->string('ammount');
            $table ->string('status');
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
        Schema::dropIfExists('temp_reps');
    }
}
