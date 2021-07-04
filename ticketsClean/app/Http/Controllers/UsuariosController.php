<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    //

    public function editar(Request $request, $obj = null)
    {

        if ($obj == null) {
            $user = new User([
                'name' => '',
                'email' => '',
                'password' => '',
                'tipo' => 1,
                'empresa' => 0
            ]);
        } else {
            $user = User::where([['id', '=', $obj]])->get()[0];
        }

        $companies = Empresa::all();

        return view('usuario')->with(array('user' => $user, 'companies' => $companies));
    }

    public function crear(Request $request)
    {
        Log::debug($request);
        Log::debug($request->input('nombre'));
        $user = new User([
            'name' => $request['nombre'],
            'email' => $request['correo'],
            'password' => Hash::make($request['contra']),
            'tipo' => 1,
            'empresa' => $request['empresa']
        ]);;
        $user->save();
        $data = User::all();
        Log::debug($data);

        return redirect()->route('usuarios.list');
    }

    public function actualizar(Request $request, $id)
    {
        Log::debug($id);
        Log::debug('req' . $request);
        $user = User::where([['id', '=', $id]])->get()[0];
        $user->name = $request['nombre'];
        if(array_key_exists('contra', $request->toArray())){
            $user->password = Hash::make($request['contra']);
        }
        
        $user->email=$request['correo'];
        $user->empresa=$request['empresa'];
        $user->save();
        return redirect()->route('usuarios.list');
    }

    public function cargar()
    {
        $data = User::all();
 

        return view('usuarios')->with(array('users' => $data));
    }
}
