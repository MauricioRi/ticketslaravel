<?php

namespace App\Http\Controllers;

use App\Models\Geocerca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class GeofencesController extends Controller
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
        return view('geofences');
    }

    public function lista()
    {
        return view('list_geofences');
    }

    public function editar($id)
    {
        Log::debug($id);
        $geofence = $this->getOne($id);
        return View::make('edit_geofence')->with(['geo' => $geofence]);
         
    }

    public function add(Request $req)
    {
        $input = $req->all();
        Log::debug($input['name']);
        Log::debug($input['datos']);
        $geocerca = Geocerca::create([
            'nombre' => $input['name'],
            'datos' => json_encode($input['datos']),
            'createdBy' => Auth::user()->id
        ])->save();

        return $geocerca;
    }

    public function update(Request $req)
    {
        $input = $req->all();
        
        Log::debug($input['datos']);
        
        $geocerca = DB::table('geocercas')
            ->where('id', $input['id'])
            ->update(['datos' => json_encode($input['datos'])]);

        return $geocerca;
    }

    public function getAll(){
        Log::debug(Geocerca::where([['createdBy', '=', Auth::user()->id]])->select(['id','datos'])->get());
        return Geocerca::where([['createdBy', '=', Auth::user()->id]])->select(['id','datos', 'nombre'])->get();
    }

    public function getOne($id){
        Log::debug(Geocerca::where([['createdBy', '=', Auth::user()->id], ['id', '=', $id]])->select(['id','datos'])->get());
        return Geocerca::where([['createdBy', '=', Auth::user()->id], ['id', '=', $id]])->select(['id','datos', 'nombre'])->get();
    }
}
