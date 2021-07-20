<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('genero',1);
            $table->string('nacionalidad');
            $table->string('ciudad_nacimiento');
            $table->string('domicilio');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->boolean('activo')->default(true);
            $table->text('modulos_usuario')->nullable();
            $table->integer('id_sangre')->nullable();
            $table->unsignedBigInteger('id_tipo_usuario')->nullable();
            $table->integer('id_estado_civil')->nullable();
            $table->string('numero_seguridad_social')->nullable();
            $table->string('afiliacion_seguridad_social')->nullable();
            $table->integer('id_estado')->nullable();
            $table->string('ine')->nullable();
            $table->integer('id_religion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('apellido_paterno');
            $table->dropColumn('apellido_materno');
            $table->dropColumn('curp');
            $table->dropColumn('rfc');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('genero',1);
            $table->dropColumn('nacionalidad');
            $table->dropColumn('ciudad_nacimiento');
            $table->dropColumn('domicilio');
            $table->dropColumn('codigo_postal');
            $table->dropColumn('telefono');
            $table->dropColumn('activo');
            $table->dropColumn('modulos_usuario');
            $table->dropColumn('id_sangre');
            $table->dropColumn('id_tipo_usuario');
            $table->dropColumn('id_estado_civil');
            $table->dropColumn('numero_seguridad_social');
            $table->dropColumn('afiliacion_seguridad_social');
            $table->dropColumn('id_estado');
            $table->dropColumn('ine');
            $table->dropColumn('id_religion');
        });
    }
}
