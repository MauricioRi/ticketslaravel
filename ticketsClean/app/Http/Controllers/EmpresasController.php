<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmpresasController extends Controller
{
    public function editar(Request $request, $empresa = null)
    {
        Log::debug($empresa);
        Log::debug($request);
        if ($empresa == null) {
            $empresa = new Empresa(['nombre' => '']);
        } else {
            $empresa = Empresa::where([['id', '=', $empresa]])->get()[0];
        }
        Log::debug($empresa);

        return view('empresa')->with(array('company' => $empresa));
    }

    public function crear(Request $request)
    {
        Log::debug($request);
        Log::debug($request->input('nombre'));
        $empresa=new Empresa(['nombre' => $request->input('nombre')]);
        $empresa->save();
        

        return redirect()->route('empresas.list');
    }

    public function actualizar(Request $request, $id)
    {
        Log::debug($id);
        Log::debug('req'.$request);
        $empresa = Empresa::where([['id', '=', $id]])->get()[0];
        $empresa->nombre=$request->input('nombre');
        $empresa->save();
        return redirect()->route('empresas.list');
    }

    public function cargar()
    {
        $data = Empresa::all();
        Log::debug($data);

        return view('empresas')->with(array('companies' => $data));
    }

    public function listar()
    {
        if(Auth::user()->tipo==0){
            $data = Empresa::all();
            return $data;
        }
        
        return [];
        
    }
}
