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

class GenericController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }



    public function check(Request $request)
    {
        return response()->json([
            'message' => 'Logged'
        ], 200);
    }
}
