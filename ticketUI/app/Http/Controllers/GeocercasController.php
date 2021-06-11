<?php

namespace App\Http\Controllers;

use App\Models\Geocerca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GeocercasController extends Controller
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

    public function getAll()
    {
        return Geocerca::where([['createdBy', '=', Auth::user()->id]])->get();
    }
}
