<?php

namespace App\Http\Controllers;

use App\Models\Choferes;
use App\Models\Choferesunidades;
use App\Models\Unidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Vincular extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    private function initialChecks($request, $permission)
    {
        $this->checkAuth($request);

        // Check permissions
        $permissions = session()->get('permissions');
        if (empty($permissions[$permission])) {
            return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
        }
    }

    public function choferesunidades(Request $request)
    {
        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos
        DB::enableQueryLog();

        $choferes = DB::table('choferes')
            ->whereNotIn('id', DB::table('choferesunidades')->pluck('idchofer'))
            ->select('*')
            ->get()
            ->toArray();      
        Log::alert(DB::getQueryLog());
        Log::debug($choferes);
        foreach ($choferes as $chofer) {
            Log::debug($chofer->id);
            $cu = new Choferesunidades(['idchofer' => $chofer->id, 'idunidad' => 0]);
            $cu->save();
        }
        $datos = Choferesunidades::all();


        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $unidad = Unidades::where([['id', '=', $d->idunidad]])->get();
            $unidad = count($unidad) > 0 ? $unidad[0]->nombre : 'Sin unidad';
            Log::emergency($unidad);
            $ds = array($d->id, Choferes::where([['id', '=', $d->idchofer]])->get()[0]->nombre, $unidad);
            Log::info($ds);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.choferes-unidades");
    }

    public function actionsUnidades(Request $request, $action, $id)
    {
        if ($action == 'delete') {
            $this->initialChecks($request, 'baja');

            Choferesunidades::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');
            $cu = Choferesunidades::findOrFail($id);
            Log::notice($cu);
            $this->results->objPorEditar = Choferes::findOrFail($cu->idchofer);
        }

        // Get data
        $choferes = DB::table('choferes')
            ->whereNotIn('id', DB::table('choferesunidades')->pluck('idchofer'))
            ->select('*')
            ->get()
            ->toArray();      
       
        foreach ($choferes as $chofer) {
            Log::debug($chofer->id);
            $cu = new Choferesunidades(['idchofer' => $chofer->id, 'idunidad' => 0]);
            $cu->save();
        }
        $datos = Choferesunidades::all();

        // Prepare dataSet for dataTable
        
        $dataSet = array();
        foreach ($datos as $d) {
            $unidad = Unidades::where([['id', '=', $d->idunidad]])->get();
            $unidad = count($unidad) > 0 ? $unidad[0]->nombre : 'Sin unidad';
            $chofer = Choferes::where([['id', '=', $d->idchofer]])->get()[0];
            $ds = array($d->id, $chofer->nombre, $unidad);                        

            $dataSet[] = $ds;
        }



        $this->results->dataSet = json_encode($dataSet);
        $unidades = DB::table('unidades')
        ->whereNotIn('id', DB::table('choferesunidades')->pluck('idunidad'))
        ->select('*')
        ->get()
        ->toArray(); 

        return view("components.asignar-unidad", ["unidades" => $unidades]);
        //return response()->json(['code' => 200]);
    }

    public function asignarUnidad(Request $request)
    {
        Log::warning($request);
        $cu = Choferesunidades::where([['idchofer','=',$request->id]])->get();
        $cu=$cu[0];
        $cu->idunidad=$request->idunidad;
        $cu->save();
        Log::emergency($cu);
        return redirect()->route('choferes-unidades');
    }
}
