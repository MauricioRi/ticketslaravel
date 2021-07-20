<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFuncionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_modulo');
            $table->string('funcion');
            $table->string('ruta_funcion');
            $table->boolean('alta')->default(true);
            $table->boolean('baja')->default(true);
            $table->boolean('consulta')->default(true);
            $table->boolean('modificacion')->default(true);
            $table->timestamps();
        });
        DB::unprepared("INSERT INTO funciones(id_modulo,funcion,ruta_funcion) VALUES(1,'CONFIG APP','super-admin')");

        DB::unprepared("INSERT INTO funciones(id_modulo,funcion,ruta_funcion) VALUES(2,'GESTION DE USUARIOS','gestion-usuarios')");

        DB::unprepared("INSERT INTO tipos_usuario(tipo,descripcion,modulos_base) VALUES('SU', 'SUPER USUARIO', '[1,2]')");
        DB::unprepared("INSERT INTO tipos_usuario(tipo,descripcion,modulos_base) VALUES('ADM', 'ADMINISTRADOR', '[2]')");

        $modulos = '{"modulos":[{"funcion":2,"permisos":[1,1,1,1]}]}';
        DB::unprepared(
            "INSERT INTO users(
                name,email,password,id_tipo_usuario,modulos_usuario,nombre,apellido_paterno,fecha_nacimiento,genero,nacionalidad,ciudad_nacimiento,domicilio,codigo_postal,telefono
            ) VALUES(
                'Administrator','admin@4dmin.adm1n','\$2y\$10\$KA7G11X3xKGK0aVjBZPOU.8YmPeBCsH2/kuEjXwN3Zdg2Tc9jMf8u',2,'$modulos','ADMINISTRATOR','ADMIN','2021-06-07', 'M','MEXICANO','MORELIA','AV. TEC.','58000','4433000000'
            )"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funciones');
    }
}
