<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    protected $cartService;
    protected $checkoutService;

    public function __construct(CartService $cartService, CheckoutService $checkoutService)
    {
        $this->cartService = $cartService;
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $products = $this->cartService->index();
        $total = $this->cartService->totlaPrice($products);
        return view('frontend.checkout.checkout')->with(['products' => $products, 'total' => $total]);
    }

    public function pay()
    {
        $this->checkoutService->pay();
        return redirect()->route('cart');
    }
}
