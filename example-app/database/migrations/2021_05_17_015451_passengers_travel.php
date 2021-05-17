<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassengersTravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers_travel', function (Blueprint $table) {
       
            $table->increments('id');
            $table->integer('id_usersystem');
            $table->integer('id_subroute');
            $table->dateTime('date_travel');
            $table->integer('number_pasager');
            $table->double('latitude_tickets', 8, 2)->comment('latitud donde fue pedido el boleto');
            $table->double('longitude__tickets', 8, 2)->comment('longitud donde fue pedido el boleto');
     });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //  Schema::dropIfExists('passengers_travel');
    }
}
