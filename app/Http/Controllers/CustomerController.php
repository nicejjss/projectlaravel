<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function login(Request $request,$id){
        if(Auth::check()){
        $user = $request->all();
        array_push($user,$id);
        dd($user);}
        else{
            return redirect('/');
        }
    }
}
