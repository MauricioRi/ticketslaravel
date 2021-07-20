<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class DevSupport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:module {modulo} {icono} {funcion} {moduloPadre?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desarrollo: Crea un nuevo modulo o submodulo con toda su estructura';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  Void
     * @return mixed
     */
    public function handle()
    {
        $module = strtoupper($this->argument('modulo'));
        $icon = strtolower($this->argument('icono'));
        $fun = strtoupper($this->argument('funcion'));
        $root = $this->argument('moduloPadre');

        $errors = false;

        // Si es submodulo
        if ($root) {
            $moduloCreado = DB::select("SELECT * FROM modulos WHERE modulo=?", [$module]);
            $this->info('Modulo: ' . $module . ' creado!');

            // Se crea la funcion o submodulo
            $route = str_replace(' DE ', ' ', $fun);
            $route = str_replace(' DEL ', ' ', $route);
            $route = str_replace(' DE LA ', ' ', $route);
            $route = str_replace(' DE LOS ', ' ', $route);
            $route = str_replace(' DE LAS ', ' ', $route);
            $route = str_replace(' ', '-', $route);
            $route = strtolower($route);

            $sqlF = DB::insert("INSERT INTO funciones(id_modulo,funcion,ruta_funcion,alta,baja,consulta,modificacion) VALUES(?,?,?,1,1,1,1)", [$moduloCreado[0]->id, $fun, $route]);
            if ($sqlF) {
                // Se obtiene el id de la funcion creada
                $funcionCreada = DB::select("SELECT * FROM funciones WHERE funcion=?", [$fun]);
                $this->info('Función: ' . $fun . ' creada!');

                // Se obtienen los usuarios base del sistema
                $tiposBase = DB::select("SELECT * FROM tipos_usuario WHERE id IN (1,2)");

                // Add modules to base modules
                $base = str_replace(']', ',' . $funcionCreada[0]->id . ']', $tiposBase[0]->modulos_base);

                // Se asigna el nuevo modulo al SU y al Default Admin
                $sqlU = DB::update("UPDATE tipos_usuario SET modulos_base=? WHERE id IN (1,2)", [$base]);
                if ($sqlU) {
                    $this->info('Se actualizo el acceso');
                } else {
                    $errors = true;
                    $this->error('Error al actualizar el acceso');
                }

                // Se prepara la asignacion de permiso al usuario
                $usr = DB::select("SELECT * FROM users WHERE id=1");
                $mu = $usr[0]->modulos_usuario;
                $mu = json_decode($mu);
                $mu->modulos[] = array('funcion' => $funcionCreada[0]->id, 'permisos' => [1, 1, 1, 1]);

                // Se le otorga el permiso al usuario
                DB::update("UPDATE users SET modulos_usuario=? WHERE id=1", [json_encode($mu)]);

                // Verifica si no hay error para continuar
                if (!$errors) {
                    // Se ejecutan los comandos de artisan

                    // Crear el controlador
                    $this->call('make:controller', ['name' => ucfirst(strtolower($module))]);
                    $this->info('Controlador creado, revisa la estructura de carpetas');

                    // Crear el modelo
                    $this->call('make:model', ['name' => ucfirst(strtolower($module))]);
                    $this->info('Modelo creado, revisa la estructura de carpetas');

                    // Crear el view
                    $this->call('make:component', ['name' => $route]);
                    $this->info('Vista creada, pero como Componente, revisa la estructura de carpetas');
                    echo '^^ Atencion ^^';
                    $this->newLine();

                    // Crear la migracion
                    $this->call('make:migration', ['name' => ('create_' . strtolower($route) . '_table')]);
                    $this->info('Migracion creada, editala y ejecuta: php artisan migrate');

                    $this->newLine();
                    $this->info("No olvides colocar la ruta en web.php: Route::any('" . $route . "', [Ctr\\" . (ucfirst(strtolower($module))) . "::class, '" . $route . "'])->name('" . $route . "')->middleware('auth');");

                    // Fin
                    $this->newLine();
                    $this->info('Se ha concluido exitosamente la ejecución de comandos');
                }
            } else {
                $errors = true;
                $this->error('Error al crear el submodulo: ' . $fun);
            }
        } else {
            // Si es modulo
            $sqlM = DB::insert("INSERT INTO modulos(modulo,icono) VALUES(?,?)", [$module, $icon]);
            if ($sqlM) {
                // Verifica el id del modulo creado
                $moduloCreado = DB::select("SELECT * FROM modulos WHERE modulo=?", [$module]);
                $this->info('Modulo: ' . $module . ' creado!');

                // Se crea la funcion o submodulo
                $route = str_replace(' DE ', ' ', $fun);
                $route = str_replace(' DEL ', ' ', $route);
                $route = str_replace(' DE LA ', ' ', $route);
                $route = str_replace(' DE LOS ', ' ', $route);
                $route = str_replace(' DE LAS ', ' ', $route);
                $route = str_replace(' ', '-', $route);
                $route = strtolower($route);

                $sqlF = DB::insert("INSERT INTO funciones(id_modulo,funcion,ruta_funcion,alta,baja,consulta,modificacion) VALUES(?,?,?,1,1,1,1)", [$moduloCreado[0]->id, $fun, $route]);
                if ($sqlF) {
                    // Se obtiene el id de la funcion creada
                    $funcionCreada = DB::select("SELECT * FROM funciones WHERE funcion=?", [$fun]);
                    $this->info('Función: ' . $fun . ' creada!');

                    // Se obtienen los usuarios base del sistema
                    $tiposBase = DB::select("SELECT * FROM tipos_usuario WHERE id IN (1,2)");

                    // Add modules to base modules
                    $base = str_replace(']', ',' . $funcionCreada[0]->id . ']', $tiposBase[0]->modulos_base);

                    // Se asigna el nuevo modulo al SU y al Default Admin
                    $sqlU = DB::update("UPDATE tipos_usuario SET modulos_base=? WHERE id IN (1,2)", [$base]);
                    if ($sqlU) {
                        $this->info('Se actualizo el acceso');
                    } else {
                        $errors = true;
                        $this->error('Error al actualizar el acceso');
                    }

                    // Se prepara la asignacion de permiso al usuario
                    $usr = DB::select("SELECT * FROM users WHERE id=1");
                    $mu = $usr[0]->modulos_usuario;
                    $mu = json_decode($mu);
                    $mu->modulos[] = array('funcion' => $funcionCreada[0]->id, 'permisos' => [1, 1, 1, 1]);

                    // Se le otorga el permiso al usuario
                    DB::update("UPDATE users SET modulos_usuario=? WHERE id=1", [json_encode($mu)]);

                    // Verifica si no hay error para continuar
                    if (!$errors) {
                        // Se ejecutan los comandos de artisan

                        // Crear el controlador
                        $this->call('make:controller', ['name' => ucfirst(strtolower($module))]);
                        $this->info('Controlador creado, revisa la estructura de carpetas');

                        // Crear el modelo
                        $this->call('make:model', ['name' => ucfirst(strtolower($module))]);
                        $this->info('Modelo creado, revisa la estructura de carpetas');

                        // Crear el view
                        $this->call('make:component', ['name' => $route]);
                        $this->info('Vista creada, pero como Componente, revisa la estructura de carpetas');
                        echo '^^ Atencion ^^';
                        $this->newLine();

                        // Crear la migracion
                        $this->call('make:migration', ['name' => ('create_' . strtolower($route) . '_table')]);
                        $this->info('Migracion creada, editala y ejecuta: php artisan migrate');

                        $this->newLine();
                        $this->info("No olvides colocar la ruta en web.php: Route::any('" . $route . "', [Ctr\\" . (ucfirst(strtolower($module))) . "::class, '" . $route . "'])->name('" . $route . "')->middleware('auth');");

                        // Fin
                        $this->newLine();
                        $this->info('Se ha concluido exitosamente la ejecución de comandos');
                    }
                } else {
                    $errors = true;
                    $this->error('Error al crear el submodulo: ' . $fun);
                }
            } else {
                $errors = true;
                $this->error('Error al crear el modulo: ' . $module);
            }
        }

        if ($errors) {
            $this->error('Hubo errores al crear el modulo: ' . $module);
        } else {
            $msg = $root ? ' - Submodulo de ' . $root : '';
            $this->info('El modulo: ' . $module . ' ha sido creado con el icono: ' . $icon . $msg);
        }
    }
}
