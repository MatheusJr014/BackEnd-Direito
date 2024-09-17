<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $input = $request->validated();
        $credentials = [
            'email' => $input['email'],
            'password'=>$input['password'],
        ];
        if (! $token = auth()->attempt($credentials)){
            return response()->json(['error'=>'Unauthorized'], 401); 
        }

        return response()->json([
            'acess_token' => $token,
            'token_type' => 'bearer', 
            'expires_in' => auth()
        ]);
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message'=>'Successfully logged out']);
    }
}
