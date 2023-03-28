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

    public function totalPrice($cartProduct)
    {
        $total = 0;

        if (!empty($cartProduct)) {
            foreach ($cartProduct as $key => $product) {
                $eachprice = $product['price'] * $product['quantity'];
                $total += $eachprice;
            }
        }

        return $total;
    }

    public function add($id, $quantity)
    {
        $cart = session()->get('cart');

        if (isset($cart)) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
                session()->put('cart', $cart);
            } else {
                $this->existAdd($id, $quantity);
            }
        } else {
            $this->create($id, $quantity);
        }
    }

    public function existAdd($id, $quantity)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'img' => $product->img,
            'quantity' => $quantity
        ];
        session()->put('cart', $cart);
    }

    public function create($id, $quantity)
    {
        $product = Product::find($id);
        $cart = [
            $id => [
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img,
                'quantity' => $quantity
            ],
        ];
        session()->put('cart', $cart);
    }

    public function update(array $data)
    {
        foreach (session()->get('cart') as $key => $value) {
            session()->put('cart.' . $key . '.quantity', $data['product_' . $key]);
        }
    }

    public function destroy()
    {
        session()->forget('cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

}
