<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkTripfuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tripfuels', function (Blueprint $table){
        $table->integer('fleet_id')->unsigned()->change();
        $table->integer('driver_id')->unsigned()->change();
        $table->foreign('fleet_id')->references('id')->on('fleets')->onDelete('cascade');
        $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tripfuels', function (Blueprint $table) {
            $table->dropForeign(['fleet_id']);
            $table->dropForeign(['driver_id']);
           
            });
    }
}
