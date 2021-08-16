<?php

namespace App\Http\Controllers;

use App\Models\Rutas as ModelsRutas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Rutas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function listar(Request $request)
    {
        Log::debug($request);

        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos
      //  $datos = ModelsRutas::where([['empresa', '=', Auth::user()->empresa]])->get();
        
        $datos = routes::paginate();
        Log::alert($datos);
        Log::debug($datos);
        return  view('ruta', ["ruta" => $route]);
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $ds = array($d->id, $d->nombre);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.listarRutas");
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

            ModelsRutas::findOrFail($id)->delete();
            //User::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

            $this->results->objPorEditar = ModelsRutas::findOrFail($id);
        }
        
        // Get obj
        $obj = ModelsRutas::where([['id', '=', $id]])
            ->get();
        
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($obj as $u) {
            $ds = array($u->id, $u->nombre, $u->datos, $u->empresa);
            $dataSet[] = $ds;
        }

        $this->results->dataSet = json_encode($dataSet);

        $data = ModelsRutas::where([['id', '=', $id]])->get()[0];
        Log::debug($data);
        return view("components.editar-geocercas")->with(array('geofences' => $data));
        //return response()->json(['code' => 200]);
    }