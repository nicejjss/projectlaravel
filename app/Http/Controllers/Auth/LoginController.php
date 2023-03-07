<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function check(LoginRequest $request)
    {
        if(Auth::guard('customer')->attempt(['name'=>$request->input('name'),'password'=>$request->input('password')])){
               return redirect()->intended();
           }
        else{
            return view('frontend.auth.login')->with(['loginfail'=>"Sai tai KHoan"]);
        }
    }
}
