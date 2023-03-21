<?php

namespace App\Traits;

trait CartTrait {

    public function index(){
        return session()->get('cart');
    }

    public function totalPrice($cart){
        $total = 0;
        if (!empty($cart)) {
            foreach ($cart as $ket => $product) {
                $eachprice = $product['price'] * $product['quantity'];
                $total += $eachprice;
            }
        }
        return $total;
    }

}
