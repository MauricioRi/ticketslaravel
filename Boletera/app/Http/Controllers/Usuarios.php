<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\Empresas;
use App\Models\User;
use App\Models\Funcion;
use App\Models\TipoUsuario;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Usuarios extends Controller
{
    //
    public function __construct() {
        parent::__construct();
        $this->middleware('auth');
    }
    
    /**
     * Funcion inicial (carga el view) para la administracion de usuarios
     * Ruta: gestion-usuarios
     * @return View: admin-usr con la lista de usuarios
     * @author Alejandro Amaro Flores 2021-06-07
     */
    public function usuarios(Request $request) {
        Log::debug($request);
        
        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);
        
        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        // Get users
        $users = User::select('users.id','users.name','users.email','tipos_usuario.descripcion','users.activo')
            ->leftJoin('tipos_usuario', function($join) {
                $join->on('users.id_tipo_usuario', 'tipos_usuario.id');
            })
            ->where([['empresa','=', Auth::user()->empresa], ['id_tipo_usuario', '>', 2]])
            ->get();
        
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($users as $u) {
            $ds = array($u->id, $u->name, $u->email, $u->descripcion);

            // Switch
            $switch = '<form action="'.route('actusr').'" method="GET">';
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

        // Set for edit
        $this->results->usuarioPorEditar = null;

        // Get user types
        $this->results->userTypes = Empresas::all();
        Log::debug($this->results->userTypes);

        $this->results->dataSet = json_encode($dataSet);
        
        return view("components.usuarios");
    }

    /**
     * Funcion para crear usuarios
     * Ruta: new-usr
     * @return Redirect gestion-usuarios con el resultado
     * @author Alejandro Amaro Flores 2021-06-07
     */
    public function createUsr(Request $request) {
        $this->initialChecks($request, 'alta');

        // Validate request
        if( !empty($request->input()) ) {
            // Para implementar despues
            // -> Password rules: Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            // Validate
            Validator::make($request->all(), [

                'nombre' => ['required','max:255'],
                'email' => [$request->input('id') ? '' : 'required','max:120','email', $request->input('id') ? '' : 'unique:users'],
                'password' => ['required','min:6','max:100'],
                
            ])->validate();

            // Get user type
            $tipoUsuario = TipoUsuario::find(3);

            // Get userType functions
            $funs = Funcion::whereIn('id_modulo',json_decode($tipoUsuario->modulos_base,true))->get();

            // Is edit
            $id = $request->input('id');

            // Create user
            $user = $id ? User::find($id) : new User();
            $user->name = strtoupper($request->input('nombre') );
            $user->nombre = strtoupper( $request->input('nombre') );
            $user->apellido_paterno = '';
            $user->apellido_materno = '';
            $user->fecha_nacimiento = Carbon::now();
            $user->genero = '';
            $user->nacionalidad = '';
            $user->domicilio = '';
            $user->codigo_postal = '';
            $user->telefono = '';
            $user->ciudad_nacimiento = 'PENDIENTE';
            $user->empresa = Auth::user()->empresa;
            // Check edit or create
            if( !$id ) {
                $user->email = strtolower( $request->input('email') );
            }
            // Password
            $user->password = Hash::make( $request->input('password') );
            $user->id_tipo_usuario = 4;
            // Modules
            $modulos = new \stdClass();
            $modulos->modulos[] = array('funcion' => $funs[0]->id_modulo, 'permisos' => [$funs[0]->alta, $funs[0]->baja, $funs[0]->consulta, $funs[0]->modificacion]);
            $user->modulos_usuario = json_encode($modulos);
            
            // Save user
            $user->save();

            // Clear editable user
            session()->forget('usuarioPorEditar');

            // Set for success msg
            session(['successMsg' => '¡Operación exitosa!, Se ha actualizado la lista de usuarios']);

            return redirect()->route('usuarios');
        }
    }

    /**
     * Funcion para habilitar o deshabilitar usuarios
     * Ruta: act-usr
     * @return Redirect gestion-usuarios con el resultado
     * @author Alejandro Amaro Flores 2021-06-07
     */
    public function enableUsr(Request $request) {
        $this->initialChecks($request, 'modificacion');

        $user = User::findOrFail($request->input('id'));
        $user->activo = !$user->activo;
        $user->save();

        return redirect()->route('usuarios');
    }

    /**
     * Funcion para editar y borrar usuarios
     * Ruta: acciones-usuario
     * @param Action: Si es editar o eliminar
     * @param Id: El id del usuario a modificar o eliminar
     * @return View: admin-usr con la lista de usuarios
     * @author Alejandro Amaro Flores 2021-06-07
     */
    public function actionsUser(Request $request, $action, $id) {
        if($action == 'delete') {
            $this->initialChecks($request, 'baja');

            User::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

            $this->results->usuarioPorEditar = User::findOrFail($id);
        }
        
        // Get users
        $users = User::select('users.id','users.name','users.email','tipos_usuario.descripcion','users.activo')
            ->leftJoin('tipos_usuario', function($join) {
                $join->on('users.id_tipo_usuario', 'tipos_usuario.id');
            })
            ->where([['empresa','=', Auth::user()->empresa], ['id_tipo_usuario', '>', 2]])
            ->get();
        
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($users as $u) {
            $ds = array($u->id, $u->name, $u->email, $u->descripcion);

            // Switch
            $switch = '<form action="'.route('actusr').'" method="GET">';
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

        // Get user types
        $this->results->userTypes = Empresas::all();
        Log::debug($this->results->userTypes);

        $this->results->dataSet = json_encode($dataSet);
        
        return view("components.usuarios");
        //return response()->json(['code' => 200]);
    }

    /**
     * Funcion para checar las credenciales, metodo de acceso y los permisos del usuario
     * @return Redirect kick/back si no cumple
     * @author Alejandro Amaro Flores 2021-06-07
     */
    private function initialChecks($request, $permission) {
        $this->checkAuth($request);

        // Check permissions
        $permissions = session()->get('permissions');
        if( empty($permissions[$permission]) ) {
            return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
        }
    }

}
