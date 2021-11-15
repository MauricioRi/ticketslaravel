<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use App\Models\Pasajero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Reportes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function reportes_egresos(Request $request)
    {
        $egreso = new Egreso();
        //$egreso->idusuario = Auth::user()->id;
        $egreso->idruta = $request['idruta'];
        //$egreso->idegreso = $request['idegreso'];
        //$egreso->valor = $request['valor'];
        Log::alert($request);
        Log::alert(Auth::user()->id);
        return 'ok';
    }

    public function reportes_pasajeros(Request $request)
    {
        $obj = new Pasajero();
        //$obj->idusuario = Auth::user()->id;
        $obj->idruta = $request['idruta'];
        $obj->boletos = $request['boletos'];
        
        Log::alert($request);
        return 'ok';
    }

    public function tipos_egresos(Request $request)
    {
        
        $egresos = DB::table('tipos_egresos')->select('*')->get();
        return $egresos;
    }
}
