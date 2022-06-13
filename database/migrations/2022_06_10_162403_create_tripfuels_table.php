<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripfuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripfuels', function (Blueprint $table) {

            
            $table->increments('id');
            $table->integer('fleet_id');
            $table->integer('driver_id');
            $table->integer('openingkm');
            $table->integer('closingkm');
            $table->integer('distance');
            $table->integer('fuelused');
            $table->decimal('avgconsumption');
            $table->integer('fuelbeforetrip');
            $table->integer('fuelvarience');
            $table->integer('addtionalfuel');//fuel for next trip
            $table->integer('fuelintank');
            $table->string('comment');
            $table->integer('shortage');
            $table->integer('user_id');
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
        Schema::dropIfExists('tripfuels');
    }
}
