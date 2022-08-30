<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTripstatusColumnToTripfuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tripfuels', function (Blueprint $table) {
           $table->enum('tripstatus',['open','closed']);
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
            $table->dropColumn('tripstatus');
        });
    }
}
