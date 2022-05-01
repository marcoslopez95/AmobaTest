<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService {
    public function Login($credentials){

        if (!Auth::attempt($credentials)){

            return custom_response(false,'Contraseña incorrecta',[],425);
        }

        $user = Auth::user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        //if ($request->remember_me)
        $token->expires_at = Carbon::now()->addDay(1);
        $token->save();
        $response = [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ];

        return custom_response(true,'Login',$response );
    }

    public function logout()
    {
        Auth::user()->token()->revoke();

        return custom_response(true,'Logout');
    }

    public function user(){
        return custom_response(true,'user',Auth::user());
    }

}
