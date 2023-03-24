<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderService
{
    public function index()
    {
        return Order::visible()->select('orders.id', 'customers.name', 'buy_date', 'status')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')->paginate(PER_PAGE);
    }

    public function detail($id)
    {
        $cus = Order::select('customers.name', 'customers.address', 'orders.buy_date')
            ->where('orders.id', $id)->join('customers', 'customers.id', '=', 'orders.customer_id')->first();
        $order = OrderDetail::select('order_id', 'img', 'price', 'number', 'products.name')
            ->where('order_details.order_id', $id)
            ->join('products', 'products.id', '=', 'order_details.product_id')->get();
        $total = Order::select('price')->where('id', $id)->first()->price;

        return [
            'cus' => $cus,
            'order' => $order,
            'total' => $total,
        ];
    }

    public function update($data)
    {
        $keys = array_keys($data);
        $orders = Order::whereIn('id', $keys)->get();

        foreach ($orders as $order) {
            if (isset($data[$order->id])) {
                $order->update([
                    'status' => $data[$order->id],
                ]);
            }
        }
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->visible = FLAG_OFF;
        $order->save();
    }
}
