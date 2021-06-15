<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function login(Request $request){
        $loginData = $request->validate([
            'email'     =>  'required|email',
            'password'  =>  'required'
        ]);

        if(!auth()->attempt($loginData)){
            return response([
                'message'  => 'Invalid Credentials'
            ]);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response([
            'user'  =>  auth()->user(),
            'access_token'  =>  $accessToken
        ]);
    }

    public function logout(){
        auth()->user()->tokens->each(function($token){
            $token->delete();
        });

        return response()->json('Logout successful', 200);
    }
}
