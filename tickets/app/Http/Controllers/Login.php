<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Login as CLogin;

class Login extends Controller
{
    public function login($var = null)
    {
        return view('login.login');
    }
}
