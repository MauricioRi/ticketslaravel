<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Funcion;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $menu; // Array: Menu for current logged user

    public $results;

    protected function __construct() {

        // middleware functions
        $this->middleware(function ($request, $next) {
            $this->results = new \stdClass();
            $this->results->messages = [];
            
            \View::share('menu', $this->menu);
            \View::share('results', $this->results);

            return $next($request); 
        });

    }

    protected function getMenu() {
        return $this->menu;
    }

    protected function setMenu($menu) {
        $this->menu = $menu;
        session(['menu' => $menu]);
        //\Session::put('menu', $this->menu);
    }

    protected function checkAuth($request) {
        if(!auth()->check() || empty(session()->get('menu'))) {
            $this->kick($request);
        }
    }

    protected function kick($request) {
        Auth::logout();

        //\Session::flush();
        session()->flush();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerate();

        //$tokenRepository = app(TokenRepository::class);
        //$tokenRepository->revokeAccessToken($request->session()->token());

        return redirect()->route('logout')->withErrors(['Acceso denegado']);
    }

    protected function validarPermisos($funcion, $permiso)
    {
        $fun = Funcion::where([['ruta_funcion', '=', $funcion]])->get()[0];
        $permisos = [];
        $jsonModules = "{}";
        $jsonModules = Auth::user()->modulos_usuario;
        $modulos = json_decode($jsonModules);

        foreach ($modulos as $modulo) {
            foreach ($modulo as $m) {
                $permisos[$m->funcion] = $m->permisos;
            }
            //
        }
        $tipoPermiso = 0;
        if($permiso=='alta'){
            $tipoPermiso=0;
        } elseif ($permiso=='baja'){
            $tipoPermiso=1;
        } elseif ($permiso=='consulta'){
            $tipoPermiso=2;
        } else {
            $tipoPermiso=3;
        }
        $permiso = $permisos[$fun->id][$tipoPermiso];
        Log::alert("permiso ".$permiso);
        if(!$permiso){
            Log::alert("sin permiso");
        }
        return $permiso;
    }

    protected function getPermissions($request) {
        // Get menu
        $menu = session()->get('menu');

        // Set default permissions
        $permissions = array('alta' => 0, 'baja' => 0, 'consulta' => 0, 'modificacion' => 0);

        // Check menu
        if(!$menu) {
            $this->kick($request);
            return $permissions;
        } else if(empty($menu)) {
            $this->kick($request);
            return $permissions;
        }

        // Get modules
        foreach ($menu as $m) {
            // Get functions
            foreach ($m[array_keys($m)[0]]['submenu'] as $s) {
                // Check permission by path
                if($request->route()->getName() == $s[1]) {
                    // Set permissions
                    $permissions['alta'] = $s['permisos'][0];
                    $permissions['baja'] = $s['permisos'][1];
                    $permissions['consulta'] = $s['permisos'][2];
                    $permissions['modificacion'] = $s['permisos'][3];
                    break;
                }
            }
        }

        return $permissions;
    }

}
