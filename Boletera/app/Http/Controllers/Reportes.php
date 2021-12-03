<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use App\Models\Pasajero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Reportes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function reportes_egresos(Request $request)
    {
        $egreso = new Egreso();
        //$egreso->idusuario = Auth::user()->id;
        $egreso->idruta = $request['idruta'];
        //$egreso->idegreso = $request['idegreso'];
        //$egreso->valor = $request['valor'];
        Log::alert($request);
        Log::alert(Auth::user()->id);
        return 'ok';
    }

    public function reportes_pasajeros(Request $request)
    {
        $obj = new Pasajero();
        //$obj->idusuario = Auth::user()->id;
        $obj->idruta = $request['idruta'];
        $obj->boletos = $request['boletos'];
        
        Log::alert($request);
        return view('components.reportes-pasajeros');
    }

    public function tipos_egresos(Request $request)
    {
        
        $egresos = DB::table('tipos_egresos')->select('*')->get();
        return $egresos;
    }

    public function imageUploadPost(Request $request)

    {

        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    

        $imageName = time().'.'.$request->image->extension();  

     

        $request->image->move(public_path('images'), $imageName);

  

        /* Store $imageName name in DATABASE from HERE */

    

        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName); 

    }

    public function addimage(Request $request)
    {        
        Log::alert($request);
        $egreso = new Egreso();
        
        
        if ($request->hasFile('image')) {    
            $path = $request->file('image')->store('public');            
            $egreso->url = $path;
            $imageName = time().'.'.$request->image->extension();       
            $egreso->nombre = $imageName;
            $egreso->idruta = $request['idruta'];
            $egreso->idruta=$request['idegreso'];
            $egreso->valor=$request['valor'];
            $egreso->idusuario=Auth::user()->id;
        }        
        $egreso->save();        
        return $egreso;
    }
}
