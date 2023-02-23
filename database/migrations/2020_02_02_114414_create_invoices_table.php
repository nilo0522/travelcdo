<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('cus_id');
            $table->string('cntrl_no');
            $table->string('book_date');
             $table->integer('night');
              $table->integer('qty');
               $table->integer('total');
                $table->string('payment');
                $table->timestamps();
                 $table->foreign('hotel_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
                   $table->foreign('cus_id')
                  ->references('id')->on('customers')
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
        Schema::dropIfExists('invoices');
    }
}
