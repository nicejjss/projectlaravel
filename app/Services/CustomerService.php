<?php


namespace App\Services;


use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerService
{


    public function checkExist($data)
    {
        if (Customer::where('name', '=', $data['name'])->first() || Customer::where('email', '=', $data['email'])->first()) {
            return true;
        }
        return false;
    }

    public function create($data)
    {
        return Customer::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email']
        ]);
    }

    public function login($request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        if (Auth::guard('customer')->attempt(['name' => $name, 'password' => $password])) {
            return redirect()->route('home');
        }
        return view('frontend.auth.login')->with(['loginfail' => "Sai tai KHoan"]);
    }

    public function register($request)
    {
        $data = $request->all();
        $check = $this->checkExist($data);

        if (!$check) {
            $user = $this->create($data);
        } else {
            return view('frontend.auth.register')->with('fail', 'Da Co Tai Khoan');

        }

        Auth::guard('customer')->loginUsingId($user->id);

        return redirect()->intended();

    }

}
