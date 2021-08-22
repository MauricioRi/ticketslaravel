<?php

namespace App\Http\Controllers;

use App\Models\Choferes as ModelsChoferes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Choferes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    private function initialChecks($request, $permission) {
        $this->checkAuth($request);

        // Check permissions
        $permissions = session()->get('permissions');
        if( empty($permissions[$permission]) ) {
            return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
        }
    }

    public function choferes(Request $request)
    {
        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos

        $datos = ModelsChoferes::all();

        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $ds = array($d->id, $d->nombre);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.choferes");
    }

    public function enableChf(Request $request)
    {
        $this->initialChecks($request, 'modificacion');

        $user = ModelsChoferes::findOrFail($request->input('id'));
        $user->activo = !$user->activo;
        $user->save();

        return redirect()->route('choferes');
    }

    public function actionsChoferes(Request $request, $action, $id)
    {
        if($action == 'delete') {
            $this->initialChecks($request, 'baja');

            ModelsChoferes::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

            $this->results->usuarioPorEditar = ModelsChoferes::findOrFail($id);
        }
        
        // Get users
        $users = ModelsChoferes::
            where([['empresa','=', Auth::user()->empresa], ['id_tipo_usuario', '>', 4]])
            ->get();
        
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($users as $u) {
            $ds = array($u->id, $u->nombre, $u->usuario);

            // Switch
            $switch = '<form action="'.route('actchf').'" method="GET">';
            $switch .= '<input type="hidden" name="id" value="'.$u->id.'" />';
            $switch .= '<div class="custom-control custom-switch custom-control-inline">';
            if($u->activo) {
                $switch .= '<input name="active_user" class="custom-control-input" type="checkbox" onchange="submit()" id="customSwitch_'.$u->id.'" checked />';
                $switch .= '<label class="custom-control-label" for="customSwitch_'.$u->id.'">Activo</label>';
            } else {
                $switch .= '<input name="active_user" class="custom-control-input" type="checkbox" onchange="submit()" id="customSwitch_'.$u->id.'" />';
                $switch .= '<label class="custom-control-label" for="customSwitch_'.$u->id.'">Inactivo</label>';
            }
            $switch .= '</div>';
            $switch .= '</form>';

            //$ds[] = $u->activo ? 'Activo' : 'Inactivo';
            $ds[] = $switch;

            $dataSet[] = $ds;
        }

        

        $this->results->dataSet = json_encode($dataSet);
        
        return view("components.chofer");
        //return response()->json(['code' => 200]);
    }

    public function editChofer(Request $request)
    {
        # code...
    }

    public function nuevoChofer()
    {
        $this->results->usuarioPorEditar = null;
        return view("components.chofer");
    }

    public function createChofer(Request $request)
    {
        $this->initialChecks($request, 'alta');

        // Validate request
        if( !empty($request->input()) ) {
            // Para implementar despues
            // -> Password rules: Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            // Validate
            
            Validator::make($request->all(), [

                'nombre' => ['required','max:255'],
                'usuario' => [$request->input('id') ? '' : 'required'],
                'password' => [$request->input('id') ? '':'required'],
                
            ])->validate();

           
            // Is edit
            $id = $request->input('id');

            // Create user
            $user = $id ? ModelsChoferes::find($id) : new ModelsChoferes();
      
            $user->nombre = strtoupper( $request->input('nombre') );            
            $user->empresa = Auth::user()->empresa;
            // Check edit or create
            $user->usuario = strtolower( $request->input('usuario') );
            // Password
            if($request->input('password')){
                $user->password = Hash::make( $request->input('password') );
            }
            
            $user->id_tipo_usuario = 5;
            // Modules
            
            // Save user
            $user->save();

            // Clear editable user
            session()->forget('usuarioPorEditar');

            // Set for success msg
            session(['successMsg' => '¡Operación exitosa!, Se ha actualizado la lista de usuarios']);

            return redirect()->route('choferes');
        }
    }
}
