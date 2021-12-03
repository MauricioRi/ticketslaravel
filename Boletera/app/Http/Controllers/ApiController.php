<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Validator;

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth');
    }

    public function login(Request $request)
    {
        Log::debug("entre a login");
        $data = $request->json()->all();
        Log::debug($data);

        if (!$request['email'] || !$request['password']) {
            Log::alert("sin datos necesarios");
            return response()->json([
                'message' => 'Missing data'
            ], 401);
        }
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized xD'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        $user->api_token=$tokenResult->accessToken;
        $user->save();
        return response()->json([
            'usuario' => $user->name,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     * GET method requires header
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     * GET method
     */
    public function logout(Request $request)
    {
        Log::alert($request);
        return response()->json([
            'message' => 'Sesión finalizada con exito'
        ]);
    }

    public function listarPrecios(String $ruta)
    {
        Log::debug('Rutas ' . $ruta);
        $precios = DB::table('table_cost')->where([['id_routes', '=', $ruta]])->get();
        return $precios;
    }

    public function listarGeocercas(String $ruta)
    {
        if ($ruta != null) {
            $data = DB::table('geocercas')
                ->join('points_routes', 'points_routes.id_geofence', '=', 'geocercas.id')
                ->join('table_cost', 'table_cost.id_destination', '=', 'geocercas.id')
                ->where([['points_routes.id_routes','=',$ruta]])
                ->select('geocercas.*','table_cost.amount')
                ->groupBy('points_routes.id')
                ->get();
        } else {
            $data = DB::table('geocercas')->get();
        }

        return $data;
    }

    public function listarRutas()
    {

        $data = DB::table('routes')->get();
        return $data;
    }

    public function get_eventos()
    {
        $data = DB::table('egresos')
        ->join('users', 'users.id', 'egresos.idusuario')
        ->select('egresos.*', 'users.name')
        ->get();
        return $data;
    }

    public function check(Request $request)
    {
        Log::alert($request);
        if (Auth::check()) {
            return response()->json([
                'message' => 'Logged'
                ], 200);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
                ], 401);
        }
    }
}
