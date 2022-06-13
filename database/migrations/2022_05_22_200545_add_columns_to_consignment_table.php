<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToConsignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consignments', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->dateTime('dateofdispatch');
            $table->string('drivername');
            $table->string('fleetno');
            $table->integer('consignmentno')->unique();      
            $table->string('contract');
            $table->string('loadingpoint');
            $table->string('offloadingpoint');
            $table->string('comment');            
            $table->string('submitted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consignments', function (Blueprint $table) {
            Schema::dropIfExists('consignments');
        });
    }
}
