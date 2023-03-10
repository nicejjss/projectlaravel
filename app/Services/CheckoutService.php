<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutService
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    //TODO: Pay Chua xong;
    public function pay()
    {
        $cartProducts = $this->cartService->index();
        $totalPrice = $this->cartService->totlaPrice($cartProducts);

        $order = Order::create([
            'customer_id' => auth('customer')->user()->id,
            'ngaymua' => Carbon::now(),
            'gia' => $totalPrice,
            'trangthai' => 0,
        ]);
        foreach ($cartProducts as $key => $cartProduct) {
            $product = Product::find($cartProduct['id']);
            $product->orders()->attach($order->id, ['number' => $cartProduct['quantity']]);
            session()->forget('cart.' . $key);
        }
    }
}
