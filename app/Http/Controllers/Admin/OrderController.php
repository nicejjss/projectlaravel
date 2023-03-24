<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->index();
        return view('admin.orders.orders')->with(['orders' => $orders]);
    }

    public function detail($id)
    {
        $data = $this->orderService->detail($id);
        return view('admin.orders.detail')->with(['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $this->orderService->update($data);
        return redirect()->route('admin.orders');
    }

    public function delete($id)
    {
        $this->orderService->delete($id);
        return redirect()->route('admin.orders');
    }
}
