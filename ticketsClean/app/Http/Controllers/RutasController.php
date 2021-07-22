<?php

namespace App\Http\Controllers;

use App\Models\routes;
use App\Models\Geocerca;
use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RutasController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $route = routes::paginate();
    Log::debug($route);
    return  view('ruta', ["ruta" => $route]);
  }

  public function listar()
  {
    //  compact("route"); es igual a ["ruta"=>$ruta]
    // return  view('login.login',compact("ruta"));
    $route = routes::paginate();
    // echo $route; 
    // echo "123";
        Log::debug($route);
    return  view('ruta', ["ruta" => $route]);


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
    // $route = routes::paginate();
    // Log::debug($route);
    // return  view('ruta', ["ruta" => $route]);
    $data = Geocerca::where([['empresa', '=', Auth::user()->empresa]])->get();
    Log::debug($data);
    return  view('rutas.create', ["geocercas" => $data]);
   
    // return  view('rutas.create', ["idCompany" => 5]);
   // return  view('rutas.create', ["idCompany" => 5]);


    // $rutas=$route;
    // // echo $rutas;
    // return $rutas;



    //return 'login';
  }
  public function store(Request $request)
  {

    // $curso->Name_route="Maravatio por charo";
    // $curso->idroutes=null;
    // $curso->description="Maravatio por charo es sin casetas";
    // $curso->save();

    $route = new routes();

 Log::debug($request);

    $request->validate([
      'name' => 'required',
      'description' => 'required',
      
    ]);
    $route->id = null;
    $route->Name_route = $request->name;
    $route->description = $request->description;
   $algo= $request->secretcamp;
   $rooms = json_decode($algo, true);

ddd($rooms);

// foreach($rooms as $name => $data) {
//     var_dump($name, $data['calID'], $data['availMsg']); // $name is the Name of Room
// }

    // $route->save();
    return  redirect()->route("listar_Rutas");
  }
  public function editar($idruta)
  {

    $route = routes::find($idruta);

    return  view('rutas.edit', ["ruta" => $route]);
  }

  public function update(Request $request, $route)
  {



    $request->validate(
      [
        'name' => 'required',
        'description' => 'required',
        'numberpoints' => 'required|numeric'
      ]

    );

    $routeupdate = routes::find($route);


    $routeupdate->Name_route = $request->name;
    $routeupdate->description = $request->description;
    $routeupdate->number_points = $request->numberpoints;
    $routeupdate->save();

    return  redirect()->route("listar_Rutas");


    //return request()->all();

  }
}
