<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('modulo');
            $table->string('icono');
            $table->timestamps();
        });
        DB::unprepared("INSERT INTO modulos(modulo,icono) VALUES('SA','fas fa-user-cog')");
        DB::unprepared("INSERT INTO modulos(modulo,icono) VALUES('ADMIN','fas fa-user-shield')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
