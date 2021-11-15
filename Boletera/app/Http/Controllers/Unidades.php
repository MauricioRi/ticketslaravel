<?php

namespace App\Http\Controllers;

use App\Models\Unidades as ModelsUnidades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Unidades extends Controller
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

    public function unidades(Request $request)
    {
        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos

        $datos = ModelsUnidades::all();

        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $ds = array($d->id, $d->nombre);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.unidades");
    }

    public function enableUnd(Request $request)
    {
        $this->initialChecks($request, 'modificacion');

        $user = ModelsUnidades::findOrFail($request->input('id'));
        $user->activo = !$user->activo;
        $user->save();

        return redirect()->route('unidades');
    }

    public function actionsUnidades(Request $request, $action, $id)
    {
        if ($action == 'delete') {
            $this->initialChecks($request, 'baja');

            ModelsUnidades::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

            $this->results->usuarioPorEditar = ModelsUnidades::findOrFail($id);
        }

        // Get users
        $users = ModelsUnidades::where([['empresa', '=', Auth::user()->empresa], ['id_tipo_usuario', '>', 4]])
            ->get();

        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($users as $u) {
            $ds = array($u->id, $u->nombre, $u->usuario);

            // Switch
            $switch = '<form action="' . route('actchf') . '" method="GET">';
            $switch .= '<input type="hidden" name="id" value="' . $u->id . '" />';
            $switch .= '<div class="custom-control custom-switch custom-control-inline">';
            if ($u->activo) {
                $switch .= '<input name="active_user" class="custom-control-input" type="checkbox" onchange="submit()" id="customSwitch_' . $u->id . '" checked />';
                $switch .= '<label class="custom-control-label" for="customSwitch_' . $u->id . '">Activo</label>';
            } else {
                $switch .= '<input name="active_user" class="custom-control-input" type="checkbox" onchange="submit()" id="customSwitch_' . $u->id . '" />';
                $switch .= '<label class="custom-control-label" for="customSwitch_' . $u->id . '">Inactivo</label>';
            }
            $switch .= '</div>';
            $switch .= '</form>';

            //$ds[] = $u->activo ? 'Activo' : 'Inactivo';
            $ds[] = $switch;

            $dataSet[] = $ds;
        }



        $this->results->dataSet = json_encode($dataSet);

        return view("components.unidad");
        //return response()->json(['code' => 200]);
    }

    public function editChofer(Request $request)
    {
        # code...
    }

    public function nuevoUnidad()
    {
        $this->results->usuarioPorEditar = null;
        return view("components.unidad");
    }

    public function createUnidad(Request $request)
    {
        $this->initialChecks($request, 'alta');

        // Validate request
        if (!empty($request->input())) {
            // Para implementar despues
            // -> Password rules: Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            // Validate

            Validator::make($request->all(), [

                'nombre' => ['required', 'max:255'],

            ])->validate();


            // Is edit
            $id = $request->input('id');

            // Create user
            $obj = $id ? ModelsUnidades::find($id) : new ModelsUnidades();

            $obj->nombre = strtoupper($request->input('nombre'));
            $obj->empresa = Auth::user()->empresa;
            // Check edit or create
            $obj->activo=1;

            // Save user
            $obj->save();

            // Clear editable user
            session()->forget('usuarioPorEditar');

            // Set for success msg
            session(['successMsg' => '¡Operación exitosa!, Se ha actualizado la lista de usuarios']);

            return redirect()->route('unidades');
        }
    }
}
