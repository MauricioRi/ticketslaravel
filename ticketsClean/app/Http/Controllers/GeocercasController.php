<?php

namespace App\Http\Controllers;

use App\Models\Geocerca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GeocercasController extends Controller
{
    //
    public function editar(Request $request, $obj = null)
    {
        
        if ($obj == null) {
            $geofence = new Geocerca(['nombre' => '']);
        } else {
            $geofence = Geocerca::where([['id', '=', $obj]])->get()[0];
        }
     

        return view('geocerca')->with(array('geofence' => $geofence));
    }

    public function crear(Request $request)
    {
        $input = $request->all();
        Log::debug($input['name']);
        Log::debug($input['datos']);
        $geocerca = Geocerca::create([
            'nombre' => $input['name'],
            'datos' => json_encode($input['datos']),
            'empresa' => Auth::user()->empresa
        ])->save();
        
        return $geocerca;
    }

    public function actualizar(Request $request, $id)
    {
        $input = $request->all();
        
        Log::debug($input['datos']);
        
        $geocerca = DB::table('geocercas')
            ->where('id', $input['id'])
            ->update(['datos' => json_encode($input['datos'])]);
        return $geocerca;
    }

    public function eliminar(Request $request, $id)
    {
        
        Log::debug(Geocerca::where([['id', '=', $id], ['empresa', '=', Auth::user()->empresa]])->get()[0]);
        $geocerca = Geocerca::where([['id', '=', $id], ['empresa', '=', Auth::user()->empresa]])->get()[0];
        $geocerca->delete();
        return 'ok';
    }

    public function cargar()
    {
        $data = Geocerca::where([['empresa', '=', Auth::user()->empresa]])->get();
        Log::debug($data);

        return view('geocercas')->with(array('geofences' => $data));
    }


    public function listar(){
        Log::debug(Geocerca::where([['empresa', '=', Auth::user()->empresa]])->select(['id','datos'])->get());
        return Geocerca::where([['empresa', '=', Auth::user()->empresa]])->select(['id','datos', 'nombre'])->get();
    }
}
