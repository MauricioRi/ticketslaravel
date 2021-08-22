<?php

namespace App\Http\Controllers;
use App\Models\points;
use App\Models\routes;
use App\Models\Geocerca;

use Hamcrest\Description;
use App\Models\cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LengthException;

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
   
  }
  public function store(Request $request)
  {

   
    $route = new routes();

 Log::debug($request);

    $request->validate([
      'name' => 'required',
      'description' => 'required',
      
    ]);
    $route->id = null;
    $route->Name_route = $request->name;
    $route->description = $request->description;
  $route->save();
 $algo= $request->secretcamp;
   $rooms = json_decode($algo, true);
   
foreach($rooms as $name => $data) {
  $cost = new cost();
  $cost->id_routes = $route->id;
  $cost->id_origin = $data["origen"];
  $cost->id_destination = $data["destino"];
  $cost->amount = $data["costo"];
  $insert = $cost->save();

  // if ($insert) {

  //     // return response()->json([
  //     //     "status" => true,
  //     //     "message" => "Se ha generado el costo con éxito"
  //     // ]);
  // } else {
  //     // return response()->json([
  //     //     "status" => false,
  //     //     "message" => "Se ha producido un error al generar el costo"
  //     // ]);
  // }
}
$listpoin= $request->listpoints;
$listcost = json_decode($listpoin, true);

//  ddd($listcost);

foreach($listcost as $name => $data) {
  $POINTS = new points();

$POINTS->id_routes = $route->id;
$POINTS->id_consecutivo = $data["consecutive"];
$POINTS->id_geofence = $data["id"];
$POINTS->id_empresa =1;
$insertpoint = $POINTS->save();
}




   
   return  redirect()->route("listar_Rutas");
  }
  public function editar($idruta)
  {

    // $route = routes::find($idruta);

     //Obtenemos todos los puntos consecutivos
     $route = DB::table("points_routes as pr")
     ->join("routes as rt", "rt.id", "=", "pr.id_routes")
     ->join("geocercas as gc", "gc.id", "=", "pr.id_geofence")
    
     ->where(["pr.id_routes"=>$idruta])
     ->orderBy("pr.id_consecutivo", "asc")
    //  ->whereRaw("pr.id_consecutivo >= " . $idConsecutivo->id_consecutivo)
    ->select('rt.Name_route','rt.description' ,'pr.id_consecutivo as consecutive','pr.id_empresa','pr.id_geofence as id','gc.nombre as namegoefence')
     ->get();




     $pointroutes = DB::table("table_cost as tc")
     ->join("routes as rt", "rt.id", "=", "tc.id_routes")
    
     ->where(["rt.id" =>$idruta])
     ->orderBy("tc.id", "asc")
    //  ->whereRaw("pr.id_consecutivo >= " . $idConsecutivo->id_consecutivo)
    ->select('tc.id_origin as origen','tc.id_destination as destino' ,'tc.amount as costo','tc.id_routes')
     ->get();
    




     //ddd($route,$pointroutes);
    return  view('rutas.edit', ["ruta" => $route , "puntos"=>$pointroutes, "id"=>$idruta]);
  }

  public function update(Request $request, $route)
  {

    Log::debug($request);
    Log::debug($route);
    //$routeupdate = routes::find($route);

    // Log::debug($routeupdate);
    // $routeupdate->Name_route = $request->name;
    // $routeupdate->description = $request->description;
    // $routeupdate->number_points = $request->numberpoints;
    // $routeupdate->save();
    $table_costpoint= $request->secretcamp;
   $rooms = json_decode($table_costpoint, true);
   
foreach($rooms as $name => $data) {
  


  $affected = DB::table('table_cost')
              ->where('id_routes',$data["id_routes"])
              ->where('id_origin',$data["origen"])
              ->where('id_destination', $data["destino"])
              ->update(['amount' =>$data["costo"]]);

 
}
$affected = DB::table('routes')
           ->where('id',$route)
           ->update([
            'Name_route' =>$request->name,
            'description' =>$request->description,
           ]);
// $algo= $request->listpoints;
// $rooms = json_decode($algo, true);

// foreach($rooms as $name => $data) {
//   Log::debug($route);
//   Log::debug($data["Name_route"]);
//   Log::debug($data["description"]);
           
//           }



// $affected = DB::table('table_cost')
//            ->where('id_routes',$data["id_routes"])
//            ->where('id_origin',$data["origen"])
//            ->where('id_destination', $data["destino"])
//            ->update(['amount' =>$data["costo"]]);
           



    return  redirect()->route("listar_Rutas");
  }
}
