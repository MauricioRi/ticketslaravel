<?php

namespace App\Http\Controllers;

use App\Models\Rutas as ModelsRutas;
use App\Models\Geocercas as ModelsGeocercas;
use App\Models\points;
use App\Models\cost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Rutas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function listar(Request $request)
    {
        Log::debug($request);

        // Get permisions
        $permissions = $this->getPermissions($request);
        Log::debug($permissions);
        session(['permissions' => $permissions]);

        // Check permission and auth
        $this->initialChecks($request, 'consulta');

        //Obtener datos
      //  $datos = ModelsRutas::where([['empresa', '=', Auth::user()->empresa]])->get();
        
        $datos = ModelsRutas::paginate();
        Log::alert($datos);
        Log::debug($datos);
      //  return  view('ruta', ["ruta" => $datos]);
        // Prepare dataSet for dataTable
        $dataSet = array();
        foreach ($datos as $d) {
            $ds = array($d->id, $d->Name_route);
            $dataSet[] = $ds;
        }

        // Set for edit
        $this->results->objPorEditar = null;
        $this->results->dataSet = json_encode($dataSet);

        return view("components.listar");
    }

    private function initialChecks($request, $permission)
    {
        $this->checkAuth($request);

        // Check permissions
        $permissions = session()->get('permissions');
        if (empty($permissions[$permission])) {
            return redirect()->back()->withErrors(['No tiene el permiso para completar la operación']);
        }
    }

    public function accionesruta(Request $request, $action, $id) {
    
        if($action == 'delete') {
            $this->initialChecks($request, 'baja');

            ModelsRutas::findOrFail($id)->delete();

            //User::findOrFail($id)->delete();
        } else {
            $this->initialChecks($request, 'modificacion');

         //   $this->results->objPorEditar = ModelsRutas::findOrFail($id);
         $route = DB::table("points_routes as pr")
         ->join("routes as rt", "rt.id", "=", "pr.id_routes")
         ->join("geocercas as gc", "gc.id", "=", "pr.id_geofence")
        
         ->where(["pr.id_routes"=>$id])
         ->orderBy("pr.id_consecutivo", "asc")
        //  ->whereRaw("pr.id_consecutivo >= " . $idConsecutivo->id_consecutivo)
        ->select('rt.Name_route','rt.description' ,'pr.id_consecutivo as consecutive','pr.id_empresa','pr.id_geofence as id','gc.nombre as namegoefence')
         ->get();
    
     $pointroutes = DB::table("table_cost as tc")
         ->join("routes as rt", "rt.id", "=", "tc.id_routes")
        
         ->where(["rt.id" =>$id])
         ->orderBy("tc.id", "asc")
        //  ->whereRaw("pr.id_consecutivo >= " . $idConsecutivo->id_consecutivo)
        ->select('tc.id_origin as origen','tc.id_destination as destino' ,'tc.amount as costo','tc.id_routes')
         ->get();
         
            
        }
        return  view('components.editarcostos', ["ruta" => $route , "puntos"=>$pointroutes, "id"=>$id]);
        // // Get obj
        // $obj = ModelsRutas::where([['id', '=', $id]])
        //     ->get();
        
        // // Prepare dataSet for dataTable
        // $dataSet = array();
        // foreach ($obj as $u) {
        //     $ds = array($u->id, $u->nombre, $u->datos, $u->empresa);
        //     $dataSet[] = $ds;
        // }

        // $this->results->dataSet = json_encode($dataSet);

        // $data = ModelsRutas::where([['id', '=', $id]])->get()[0];
        // Log::debug($data);
        // return view("components.editar-geocercas")->with(array('geofences' => $data));
        // //return response()->json(['code' => 200]);
       
    }

    // public function editar(Request $request, $idruta)
    // {
        
        
    //    return response()->json(["ruta" => $route , "puntos"=>$pointroutes, "id"=>$idruta]);
    //    // ddd($route,$pointroutes);
    //     //return  view('components.editarcostos', ["ruta" => $route , "puntos"=>$pointroutes, "id"=>$idruta]);
       
    // //    return view("components.editar-costos")->with(array('ruta' => $route, "puntos" => $pointroutes));
    // //    return  view('rutas.edit', ["ruta" => $route , "puntos"=>$pointroutes, "id"=>$idruta]);
    // }



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
             
  
  
  
      return  redirect()->route("listar");
    }


    public function crear()
  {
    //  compact("route"); es igual a ["ruta"=>$ruta]
    // return  view('login.login',compact("ruta"));
    // $route=routes::paginate();
    // $route = routes::paginate();
    // Log::debug($route);
    // return  view('ruta', ["ruta" => $route]);
    $data = ModelsGeocercas::where([['empresa', '=', Auth::user()->empresa]])->get();
    //Log::debug($data);
   // ddd($data);
    // return  view('components.editarcostos', ["ruta" => $route , "puntos"=>$pointroutes, "id"=>$id]);
    return  view('components.rutascrear', ["geocercas" => $data]);
   
  }


  public function store(Request $request)
  {

   
    $route = new ModelsRutas();

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

  
}
$listpoin= $request->listpoints;
$listcost = json_decode($listpoin, true);

//  ddd($listcost);

foreach($listcost as $name => $data) {
  $POINTS = new points();
$POINTS->id=null;
$POINTS->id_routes = $route->id;
$POINTS->id_consecutivo = $data["consecutive"];
$POINTS->id_geofence = $data["id"];
$POINTS->id_empresa =1;
$insertpoint = $POINTS->save();
}




   
return  redirect()->route("listar");
  }
}