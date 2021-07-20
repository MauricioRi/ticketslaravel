<?php

namespace App\Http\Controllers;

use App\Models\Empresas as ModelsEmpresas;
use App\Models\Funcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Empresas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function empresas(Request $request)
    {
        Log::debug($request);

        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos

        $datos = ModelsEmpresas::all();

        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $ds = array($d->id, $d->nombre);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.empresas");
    }

    private function initialChecks($request, $permission)
    {
        Log::debug($request);
        $this->checkAuth($request);

        // Check permissions
        $permissions = session()->get('permissions');
        if (empty($permissions[$permission])) {
            return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
        }
    }



    public function actionsCompanies(Request $request, $action, $id)
    {
        if ($action == 'delete') {
            $this->initialChecks($request, 'baja');

            if ($this->validarPermisos('empresas', 'baja')) {
                ModelsEmpresas::findOrFail($id)->delete();
            } else {
                return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
            }

            //User::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

            if ($this->validarPermisos('empresas', 'modificacion')) {
                $this->results->objPorEditar = ModelsEmpresas::findOrFail($id);
                // Get obj
                $obj = ModelsEmpresas::where([['id', '=', $id]])
                    ->get();

                // Prepare dataSet for dataTable
                $dataSet = array();
                foreach ($obj as $u) {
                    $ds = array($u->id, $u->nombre, $u->datos, $u->empresa);
                    $dataSet[] = $ds;
                }

                $this->results->dataSet = json_encode($dataSet);

                $data = ModelsEmpresas::where([['id', '=', $id]])->get()[0];
                Log::debug($data);
                return view("components.editarempresa")->with(array('obj' => $data));
            } else {
                return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
            }
        }

        return redirect("empresas");
        //return response()->json(['code' => 200]);
    }

    public function crearempresa(Request $request)
    {

        $this->validarPermisos('crearempresa', 'alta');
        $data = [];
        Log::debug($data);
        $this->results->objPorEditar = new ModelsEmpresas(['nombre' => '']);

        return view("components.crearempresa")->with(array('companies' => $data));
    }

    public function createCompany(Request $request)
    {
        Log::debug($request);
        Log::debug($request->input('nombre-empresa'));
        $empresa = new ModelsEmpresas(['nombre' => $request->input('nombre-empresa')]);
        $empresa->save();


        return view("components.crearempresa");
    }

    public function crear(Request $request)
    {

        if ($this->validarPermisos('empresas', 'alta')) {
            Log::debug($request);
            Log::debug($request->input('nombre'));
            $empresa = new ModelsEmpresas(['nombre' => $request->input('nombre-empresa')]);
            $empresa->save();
        } else {
            return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
        }



        return redirect("empresas");
    }

    public function actualizar(Request $request, $id)
    {
        if ($this->validarPermisos('empresas', 'modificacion'))
            Log::debug($id);
        Log::debug('req' . $request);
        $empresa = ModelsEmpresas::where([['id', '=', $id]])->get()[0];
        $empresa->nombre = $request->input('nombre-empresa');
        $empresa->save();
        return redirect("empresas");
    }
}
