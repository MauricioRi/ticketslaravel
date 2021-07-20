<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Modulo;
use App\Models\Funcion;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Funcion inicial para generar el menu y verificar que el usuario sea activo
     * Ruta: inicio
     * @return View: home
     * @author Alejandro Amaro Flores 2021-06-07
     */
    public function inicio(Request $request)
    {
        $pageConfigs = ['showMenu' => false];

        // Get user
        if (auth()->check()) {
            $user = auth()->user();

            // Check active
            if ($user->activo) {
                $this->handle($user);

                return view('content.home', ['pageConfigs' => $pageConfigs]);
            } else {
                // Inactive user, then revoke token and flush session
                $this->kick($request);
            }
        } else {
            // Inactive user, then revoke token and flush session
            $this->kick($request);
        }
    }

    /**
     * Funcion privada que crea el menu y lo agrega a la sesion
     * Ruta: inicio
     * @author Alejandro Amaro Flores 2021-06-07
     */
    private function handle($user)
    {
        // Initialize menu
        $modulos = array();
        $funciones = array();
        $this->results->modulos = array();
        $this->results->funciones = array();

        // Initialize jsonModules
        $jsonModules = "{}";

        // Check modules
        if ($user->modulos_usuario) {
            $jsonModules = $user->modulos_usuario;
        }
        $modules = json_decode($jsonModules);

        // Set user modules
        $modulosUsuario = array();

        // Check functions
        if ($modules->modulos) {
            foreach ($modules->modulos as $m) {
                $funcion = Funcion::find($m->funcion);

                $modulo = Modulo::find($funcion->id_modulo);

                if (!in_array($funcion->id, $funciones)) {
                    $funciones[] = $funcion->id;
                    $this->results->funciones[] = $funcion;
                }
                if (!in_array($modulo->id, $modulos)) {
                    $modulos[] = $modulo->id;
                    $this->results->modulos[] = $modulo;

                    $modulosUsuario[] = array($m->funcion => $m->permisos);
                }
            }
        }

        $permisos=[];
        $jModules = "{}";
        $jModules = Auth::user()->modulos_usuario;
        $modulosuser = json_decode($jModules);

        foreach($modulosuser as $modulo){
            Log::critical("modulo");
            Log::critical($modulo);
            foreach($modulo as $m){
                $permisos[$m->funcion]=$m->permisos;
            }
            //
        }

        // Create menu
        $this->results->menu = array();
        if (count($modulos) > 0 && count($funciones) > 0) {
            for ($i = 0; $i < count($this->results->modulos); $i++) {
                $m = $this->results->modulos[$i];
                $menu = [$m->id => [$m->modulo, $m->icono, 'submenu' => array()]];

                foreach ($this->results->funciones as $f) {
                    if ($f->id_modulo == $m->id) {
                        Log::debug($modulosUsuario);
                        $menu[$m->id]['submenu'][$f->id] = [$f->funcion, $f->ruta_funcion, 'permisos' => $permisos[$f->id]];
                    }
                }
                array_push($this->results->menu, $menu);
            }
            Log::debug($this->results->menu);
            //$this->results->menu = $menu;
        }
        //$this->setMenu($menu);
        $this->setMenu($this->results->menu);
    }
}
