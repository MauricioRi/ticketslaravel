<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // `id` int(11) NOT NULL,
        // `id_route` int(11) NOT NULL COMMENT 'id de la ruta asignada',
        // `id_user` int(11) NOT NULL COMMENT 'id de usuario ',
        // `status` tinyint(1) NOT NULL COMMENT 'stauts de la ruta asignada'
        Schema::create('users_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_route');
            $table->integer('id_user');
            $table->tinyInteger('status');
           

          });




        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   //  Schema::dropIfExists('users_routes');
    }
}
