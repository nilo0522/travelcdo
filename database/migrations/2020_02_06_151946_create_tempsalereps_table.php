<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempsalerepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempsalereps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bookdate');
            $table->string('guest');
            $table->string('cntrl');
            $table->string('payment');
            $table->integer('total');
            $table->integer('amountres');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempsalereps');
    }
}
