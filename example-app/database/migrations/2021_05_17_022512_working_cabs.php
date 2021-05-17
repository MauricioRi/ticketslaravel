<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorkingCabs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CREATE TABLE `working_cabs` (
        //     `id` int(11) NOT NULL,
        //     `idusersystem` int(11) NOT NULL COMMENT 'id del usuario o unidad',
        //     `latitude` int(11) NOT NULL COMMENT 'latitud donde se encuentra ',
        //     `longitude` int(11) NOT NULL COMMENT 'longitud donde se encuentra ',
        //     `status` int(11) NOT NULL COMMENT 'estatus de la unidad ',
        //     `location_update` datetime NOT NULL COMMENT 'hora en que actualizo su posicion'
        Schema::create('working_cabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idusersystem');
            $table->double('latitude', 8, 2)->comment('latitud donde fue pedido el boleto');
            $table->double('longitude', 8, 2)->comment('latitud donde fue pedido el boleto');
            $table->tinyInteger('status');
            $table->integer('id_user');
            $table->dateTime('location_update');


           
           

          });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//  Schema::dropIfExists('working_cabs');  
}
}