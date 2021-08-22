<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_cost', function (Blueprint $table) {
            $table->id();
            $table->integer('id_routes')->comment('id de la ruta');
             $table->integer('id_origin')->comment('id del origen');
             $table->integer('id_destination')->comment('id del destino');
             $table->decimal('amount', $precision = 8, $scale = 2)->comment('costo total');
              $table->timestamp('created_at')->nullable()->comment('fecha de creacion');
             $table->timestamp('modification_date')->nullable()->comment('fecha de creacion');
             $table->integer('user_create')->nullable()->comment('usuario que la creo');
             $table->integer('user_update')->nullable()->comment('usuario que la edito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_cost');
    }
}
