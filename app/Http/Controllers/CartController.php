<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    //
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function get()
    {
        return $this->cartService->index();
    }

    public function index()
    {
        $cartProducts = $this->cartService->index();
        $total = $this->cartService->totlaPrice($cartProducts);
        return view('frontend.cart.cart')->with(['cart_products' => $cartProducts, 'total' => $total]);
    }

    public function add($id, Request $request)
    {
        $quantity = $request->input('quantity');
        $this->cartService->add($id, $quantity);
        return redirect('/cart');
    }

    public function destroy()
    {
        $this->cartService->destroy();
        return redirect('/cart');
    }

    public function delete($id)
    {
        $this->cartService->remove($id);
        return redirect('/cart');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $this->cartService->update($data);
        return redirect('/cart');
    }
}
