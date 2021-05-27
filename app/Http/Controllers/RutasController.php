<?php

namespace App\Http\Controllers;

use App\Models\routes;
use Hamcrest\Description;
use Illuminate\Http\Request;

class RutasController extends Controller
{
    public function listar()
    {
      //  compact("route"); es igual a ["ruta"=>$ruta]
        // return  view('login.login',compact("ruta"));
         $route=routes::paginate();
         return  view('rutas',["ruta"=>$route]);
         
       
        // $rutas=$route;
        // // echo $rutas;
        // return $rutas;



        //return 'login';
    }
    public function crear()
    {
      //  compact("route"); es igual a ["ruta"=>$ruta]
        // return  view('login.login',compact("ruta"));
        // $route=routes::paginate();
         return  view('rutas.create',["iduser"=>5]);
         
       
        // $rutas=$route;
        // // echo $rutas;
        // return $rutas;



        //return 'login';
    }
    public function store(Request $request){
        
        // $curso->Name_route="Maravatio por charo";
        // $curso->idroutes=null;
        // $curso->description="Maravatio por charo es sin casetas";
        // $curso->save();
        
        $route =new routes();
       


        $request->validate([
          'name'=>'required',
          'description'=> 'required',
          'numberpoints'=>'required|numeric'
          ]);
        $route->id=null;
        $route->Name_route=$request->name;
        $route->description=$request->description;
        $route->number_points=$request->numberpoints;
        
        $route->save();
        return  redirect()->route("listar_Rutas");
    }
    public function editar($idruta)
    {
     
        $route =routes::find($idruta);
        
         return  view('rutas.edit',["ruta"=>$route]);
      }

      public function update(Request $request ,$route)
      {

      

          $request->validate([
        'name'=>'required',
        'description'=> 'required',
        'numberpoints'=>'required|numeric'
]

          );

   $routeupdate =routes::find($route);


   $routeupdate->Name_route=$request->name;
   $routeupdate->description=$request->description;
   $routeupdate->number_points=$request->numberpoints;
  $routeupdate->save();
   
    return  redirect()->route("listar_Rutas");

       
        //return request()->all();

      }
}
