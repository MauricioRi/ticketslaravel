<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePointsRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_routes', function (Blueprint $table) {
            $table->id();
           $table->integer('id_consecutivo');
            $table->integer('id_routes');
            $table->integer('id_empresa');
            $table->integer('id_geofence');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('user_create')->nullable();
            $table->integer('user_update')->nullable();
        });






         }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points_routes');
    }
}







