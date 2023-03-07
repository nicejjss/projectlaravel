<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    //
    protected $cartservice;
    public function __construct(CartService $cartService)
    {
        $this->middleware('customer');
        $this->cartservice= $cartService;
    }

    public function get()
    {
        return $this->cartservice->index();
    }

    public function index (){
        $cart_products = $this->cartservice->index();
        $total =0;
        if(!empty($cart_products)){
            $total = $this->cartservice->totlaPrice();
        }
        return view('frontend.cart.cart')->with(['cart_products'=>$cart_products,'total'=>$total]);
    }

    public function add($id,Request $request){
       $quantity= $request->input('quantity');
        $this->cartservice->add($id,$quantity);
        return redirect('/cart');
    }

    public function destroy(){
        $this->cartservice->destroy();
        return redirect('/cart');
    }

    public function delete($id){
        $this->cartservice->remove($id);
        return redirect('/cart');
    }

    public function update(Request $request){
        $data = $request->all();
        $this->cartservice->update($data);
        return redirect('/cart');
    }
}
