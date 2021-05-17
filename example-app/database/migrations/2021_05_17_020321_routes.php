<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Routes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
           



            $table->increments('idroutes');
            $table-> char('Name_route', 100);
            $table-> char('description', 100);


            
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          //  Schema::dropIfExists('routes');
    }
}
