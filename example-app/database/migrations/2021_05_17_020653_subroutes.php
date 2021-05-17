<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subroutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subroutes', function (Blueprint $table) {
        $table->increments('id_subroute');
        $table->integer('id_route')->comment('id de la ruta');
        //`name_subroutes` varchar(45) DEFAULT NULL,
        $table->integer('previous_geofence')->comment('geocerca anterior');
        $table->integer('next_geofence')->comment('geocerca anterior');
        $table->float('minimum_rate', 8, 2);
        $table->json('amoun_subroutine_points')->comment('un json donde se almacenan los costos de la subrruta ');
          });
        }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //  Schema::dropIfExists('subroutes');
    }
}
