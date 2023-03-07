<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    protected $cartservice;
    protected $checkoutservice;
    public function __construct(CartService $cartService,CheckoutService $checkoutservice)
    {
        $this->middleware('customer');
        $this->cartservice = $cartService;
        $this->checkoutservice = $checkoutservice;
    }
    public function index(){
        $products = $this->cartservice->index();
        $total =0;
        if(!empty($products)){
            $total = $this->cartservice->totlaPrice();
        }
        return view('frontend.checkout.checkout')->with(['products'=>$products,'total'=>$total]);
    }

    public function pay(){
        $products = $this->cartservice->index();
        return view('frontend.checkout.checkout')->with(['products'=>$products]);
    }
}
