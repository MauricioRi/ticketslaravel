<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Geocercas as ModelsGeocercas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\routes;
class Rutas extends Controller
{
    // return view("components.geocercas");


    public function listar()
  {
    //  compact("route"); es igual a ["ruta"=>$ruta]
    // return  view('login.login',compact("ruta"));
    $route = routes::paginate();
    // echo $route; 
    // echo "123";
        Log::debug($route);
        // return view("components.geocercas");
    return  view('components.ruta', ["ruta" => $route]);


    // $rutas=$route;
    // // echo $rutas;
    // return $rutas;



    //return 'login';
  }
    
}
