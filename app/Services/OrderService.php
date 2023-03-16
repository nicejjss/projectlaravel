<?php


namespace App\Services;


use App\Http\Middleware\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Console\Style\table;

class OrderService
{
    public function index()
    {
        return Order::select('orders.id', 'customers.name', 'buy_date', 'status')->join('customers', 'customers.id', '=', 'orders.customer_id')->paginate(PER_PAGE);
    }

    public function detail($id)
    {
        $cus = Order::select('customers.name', 'customers.address', 'orders.buy_date')->where('orders.id', $id)->join('customers', 'customers.id', '=', 'orders.customer_id')->first();
        $order = OrderDetail::select('order_id', 'img', 'price', 'number', 'products.name')->where('order_details.order_id', $id)->join('products', 'products.id', '=', 'order_details.product_id')->get();
        $total = Order::select('price')->where('id', $id)->first()->price;
        $data = [
            'cus' => $cus,
            'order' => $order,
            'total' => $total,
        ];
        return $data;
    }

    public function update($data)
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            if (isset($data['order_' . $order->id])) {
                $order->update([
                    'status' => $data['order_' . $order->id]
                ]);
            }
        }
    }

    public function delete($id)
    {
        OrderDetail::where('order_id', $id)->delete();
        $order = Order::find($id);
        $order->delete();
    }
}
