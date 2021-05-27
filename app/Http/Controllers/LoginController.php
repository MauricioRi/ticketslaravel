<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login($ruta)
    {
      //  compact("curso"); es igual a ["ruta"=>$ruta]
        return view('login.login',compact("ruta"));
        //return 'login';
    }
}
