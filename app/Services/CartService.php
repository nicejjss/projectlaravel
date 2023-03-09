<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{

    public function index()
    {
        return session()->get('cart');
    }

    public function totlaPrice($cartProducts)
    {
        $total = 0;
        foreach (session()->get('cart') as $ket => $product) {
            $eachprice = $product['price'] * $product['quantity'];
            $total += $eachprice;
        }
        return $total;
    }

    public function add($id, $quantity)
    {
        $product = Product::find($id);
        $cart_product = [
            'id' => $id,
            'img' => $product->img,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity
        ];
        if (session()->has('cart')) {
            $has = 0;
            foreach (session()->get('cart') as $key => $value) {
                if ($value["id"] == $id) {
                    $number = session()->get('cart')[$key]['quantity'] + $cart_product['quantity'];
                    session()->put('cart.' . $key . '.quantity', $number);
                    $has = 1;
                }
            }
            if ($has == 0) {
                session(['cart' => array_merge(session()->get('cart'), ['product_' . $id => $cart_product])]);
            }
        } else {
            $this->create($id, $cart_product);
        }
    }

    public function create($id, $cart_product)
    {
        session()->put('cart', ['product_' . $id => $cart_product]);
    }

    public function destroy()
    {
        session()->forget('cart');
    }

    public function update(array $data)
    {
        foreach (session()->get('cart') as $key => $value) {
            session()->put('cart.' . $key . '.quantity', $data[$key]);
        }
    }

    public function remove($id)
    {
        session()->forget('cart.product_' . $id);
    }

}
