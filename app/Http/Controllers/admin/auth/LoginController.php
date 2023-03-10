<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    protected $userService;
    public function __construct(UserService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function check(LoginRequest $request)
    {
        return $this->customerService->login($request);
}
