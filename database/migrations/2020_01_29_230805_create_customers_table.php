<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> string('fname');
            $table -> string('lname');
        
            $table -> string('contact_no');
            $table -> string('email');
            $table ->string('password');
            $table -> string('ch_name');
            $table -> string('c_type');
            $table -> integer('c_number');
            $table -> string('status');
             $table -> string('image');
            
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
        Schema::dropIfExists('customers');
    }
}
