<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login($var)
    {
        return view('login.login');
        //return 'login';
    }
}

