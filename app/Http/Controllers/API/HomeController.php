<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();        

        if (!$user || !\Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Request Token Gagal'
            ], 401);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'message'   => 'success',
            'user'      => $user,
            'token'     => $token,   
        ], 200);
    }

  
}