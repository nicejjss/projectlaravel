<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function validator($data){
        return Validator::make($data,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required',
        ]);
    }
    public function create($data){
        return Customer::create([
            'name'=>$data['name'],
            'password'=>Hash::make($data['password']),
            'address'=>$data['address'],
            'phone'=>$data['phone'],
            'email'=>$data['email']
        ]);
    }
    public function check($data){
        if(Customer::where('name','=',$data['name'])->first() || Customer::where('email','=',$data['email'])->first()){
           return true;
        }
        return false;
    }

    public function register(Request $request){
            $data = $request->all();
            $this->validator($data)->validate();
          $check= $this->check($data);
           if($check==false){
              $user = $this->create($data);
           }
           else{
               return view('frontend.auth.register')->with('fail','Da Co Tai Khoan');
           }
        Auth::guard('customer')->loginUsingId($user->id);
        return redirect()->intended();
    }
    public function index(){
        return view('frontend.auth.register');
    }
}
