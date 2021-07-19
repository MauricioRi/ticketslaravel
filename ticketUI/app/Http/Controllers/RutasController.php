<?php

namespace App\Http\Controllers;

use App\Models\routes;
use App\Models\points;
use App\Models\cost;
use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        echo $route;
        echo "123";
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


        return  view('rutas.create', ["idCompany" => 5]);


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



        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'numberpoints' => 'required|numeric'
        ]);
        $route->id = null;
        $route->Name_route = $request->name;
        $route->description = $request->description;
        $route->number_points = $request->numberpoints;

        $route->save();
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

    public function showRouteCost($idroute)
    {
        $route = routes::find($idroute);

        if (!is_null($route)) {
            $cost = $this->getroutes($idroute);

            // $points = $this->getAllPoints($idroute);
            return view("rutas.new_cost", ["ruta" => $route, "costRegister" => $cost]);
        } else
            return redirect()->route("listar_Rutas");
    }

    public function costRoute($idroute)
    {
        $route = routes::find($idroute);

        if (!is_null($route)) {
            $cost = $this->getroutes($idroute);

            $points = $this->getAllPoints($idroute);
            return view("rutas.new_cost", ["ruta" => $route, "costRegister" => $cost, "points" => $points]);
        } else
            return redirect()->route("listar_Rutas");
    }

    private function getroutes($idroute)
    {
        $routes = DB::table('table_cost as tc')
            ->join("points_routes as pro", "pro.id", "=", "tc.id_origin")
            ->join("geocercas as go", "go.id", "=", "pro.id_geofence")
            ->join("points_routes as prd", "prd.id", "=", "tc.id_destination")
            ->join("geocercas as gd", "gd.id", "=", "prd.id_geofence")
            ->orderBy("tc.id_origin", "asc")
            ->orderBy("prd.id_consecutivo", "asc")
            ->where(["tc.id_routes" => $idroute, "pro.id_empresa" => 1])
            ->get(["tc.amount", "go.nombre as nombreO", "gd.nombre as nombreD"]);

        return $routes;
    }

    private function getAllPoints($idroute)
    {
        return DB::table("points_routes as pr")
            ->join("geocercas as g", "g.id", "=", "pr.id_geofence")
            ->orderBy("pr.id_consecutivo", "asc")
            ->where(["pr.id_routes" => $idroute])
            ->get(["pr.id", "g.nombre"]);
    }

    public function getPointsFilter($idpoint)
    {
        //Obtenemos el consecutivo del punto seleccionado
        $idConsecutivo = points::find($idpoint);

        //Obtenemos todos los puntos consecutivos
        $routes = DB::table("points_routes as pr")
            ->join("geocercas as g", "g.id", "=", "pr.id_geofence")
            ->orderBy("pr.id_consecutivo", "asc")
            ->where(["pr.id_routes" => $idConsecutivo->id_routes])
            ->whereRaw("pr.id_consecutivo >= " . $idConsecutivo->id_consecutivo)
            ->get(["pr.id", "g.nombre"]);

        return response()->json($routes);
    }

    public function getCostPoints($idorigen, $iddestino)
    {
        $costDB = DB::table("table_cost")
            ->where(["id_origin" => $idorigen, "id_destination" => $iddestino])
            ->first();

        return response()->json($costDB);
    }

    public function saveCostPoint(Request $request)
    {


        $validator = \Validator::make(
            $request->all(),
            [
                'idroute' => 'required',
                'idorigen' => 'required',
                'iddestino' => 'required',
                'monto' => 'required|numeric'
            ]
        );

        // dd("OK");
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $exist = DB::table("table_cost")->where([
            "id_origin" => $request->input("idorigen"),
            "id_routes" => $request->input("idroute"),
            "id_destination" => $request->input("iddestino")
        ])->first();

        $cost = new cost();

        $cost->id_routes = $request->input("idroute");
        $cost->id_origin = $request->input("idorigen");
        $cost->id_destination = $request->input("iddestino");
        $cost->amount = $request->input("monto");
        $insert = false;
        if (!is_null($exist)) {
            $cost->id = $exist->id;
            // $cost = new cost();

            // dd($exist->id);
            $insert = DB::table("table_cost")
                ->where(["id" => $exist->id])
                ->update(["amount" => $request->input("monto")]);
            // cost::update(
            //     [
            //         "amount" => $request->input("monto")
            //     ],
            //     [
            //         "id" => $exist->id
            //     ]
            // );
        } else
            $insert = $cost->save();

        if ($insert) {
            return response()->json([
                "status" => true,
                "message" => "Se ha generado el costo con éxito"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Se ha producido un error al generar el costo"
            ]);
        }
    }
}
