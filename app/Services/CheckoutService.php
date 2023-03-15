<?php


namespace App\Services;


use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\CartTrait;


class CheckoutService
{
    use CartTrait;

    public function pay()
    {
        $cartProducts = $this->index();
        $totalPrice = $this->totalPrice($cartProducts);

        $order = Order::create([
            'customer_id' => auth('customer')->user()->id,
            'buy_date' => date('Y-m-d H:i:s'),
            'price' => $totalPrice,
            'status' => 0,
        ]);

        $orderDetails = [];
        foreach ($cartProducts as $key => $cartProduct) {
            $orderDetail = [
                'product_id' => $key,
                'order_id' => $order->id,
                'number' => $cartProduct['quantity']
            ];
            $orderDetails[] = $orderDetail;
        }
        OrderDetail::insert($orderDetails);
        session()->forget('cart');
    }
}
