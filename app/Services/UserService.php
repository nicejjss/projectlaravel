<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function login($request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        if (Auth::guard('user')->attempt(['name' => $name, 'password' => $password])) {
            return redirect()->route('admin.home');
        }
        return view('Admin.auth.login')->with(['loginfail' => "Sai tai KHoan"]);
    }
}
