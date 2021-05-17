<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            Schema::create('geofences', function (Blueprint $table) {
                $table->increments('id_geofence');
                $table->char('name', 45);
                $table-> char('description', 45);
                $table->double('centro_latitude', 8, 2);
                $table->double('centro_longitude', 8, 2);
                $table->double('radio', 8, 2);
                $table->integer('idusersystem')->comment('usuario que creo la geocerca');
             




        });
      






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //  Schema::dropIfExists('geofences');
    }
}
