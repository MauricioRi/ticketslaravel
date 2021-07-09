<?php

namespace App\Http\Controllers;


use App\Models\routes;
use Hamcrest\Description;
use Illuminate\Http\Request;
use App\Models\Geocerca;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class RoutasController extends Controller
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
        return  view('rutas.create', ["iduser" => Auth::user()->id]);


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


    public function cargar(){
        $route = Geocerca::paginate();
        Log::debug($route);

    }


        public function index(){

            // Load index view
            return view('index');
          }
       
          // Fetch records
          public function getEmployees(Request $request){
             $search = $request->search;
       
             if($search == ''){
                $employees = Employees::orderby('name','asc')->select('id','name')->limit(5)->get();
             }else{
                $employees = Employees::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
             }
       
             $response = array();
             foreach($employees as $employee){
                $response[] = array(
                     "id"=>$employee->id,
                     "text"=>$employee->name
                );
             }
             return response()->json($response); 
          } 
    }
}
