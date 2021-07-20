<?php

namespace App\Http\Controllers;

use App\Models\Geocercas as ModelsGeocercas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Geocercas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function geocercas(Request $request)
    {
        Log::debug($request);

        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos
        $datos = ModelsGeocercas::where([['empresa', '=', Auth::user()->empresa]])->get();
        Log::alert($datos);

        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $ds = array($d->id, $d->nombre);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.geocercas");
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

    public function actionsGeofences(Request $request, $action, $id) {
        if($action == 'delete') {
            $this->initialChecks($request, 'baja');

            ModelsGeocercas::findOrFail($id)->delete();
            //User::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

            $this->results->objPorEditar = ModelsGeocercas::findOrFail($id);
        }
        
        // Get obj
        $obj = ModelsGeocercas::where([['id', '=', $id]])
            ->get();
        
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($obj as $u) {
            $ds = array($u->id, $u->nombre, $u->datos, $u->empresa);
            $dataSet[] = $ds;
        }

        $this->results->dataSet = json_encode($dataSet);

        $data = ModelsGeocercas::where([['id', '=', $id]])->get()[0];
        Log::debug($data);
        return view("components.editar-geocercas")->with(array('geofences' => $data));
        //return response()->json(['code' => 200]);
    }

    public function creargeocercas()
    {
        $data = ModelsGeocercas::where([['empresa', '=', Auth::user()->empresa]])->get();
        Log::debug($data);

        return view("components.crear-geocercas")->with(array('geofences' => $data));
    }

    public function crear(Request $request)
    {
        $input = $request->all();
        Log::debug($input['name']);
        Log::debug($input['datos']);
        $geocerca = ModelsGeocercas::create([
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
}
