<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }
    //

    public function SignUp(SignUpRequest $request){

    }

    public function Login(LoginRequest $request){
        return $this->service->Login($request->only(['email','password']));
    }

    public function user(){
        return custom_response(true,'user',Auth::user());
    }
}
