<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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
        $totalprice = 0;
        $eachprice = 0;
        //Tao order khi checkout
//        $this->model->execute("INSERT INTO `tbl_order`(`customer_id`, `ngaymua`, `gia`, `trangthai`) VALUES ('$customer_id',now(),'$totalprice','0')");

        $products = $this->cartService->index();
        $totalprice = $this->cartService->totlaPrice($products);

        $order = Order::create([
            'customer_id' => auth('customer')->user()->id,
            'gia' => $totalprice,
            'tranthai' => 0,
            'ngaymua' => now(),
        ]);

//        $order_id = $this->model->fetch_one("SELECT * FROM `tbl_order` WHERE customer_id=$customer_id ORDER BY tbl_order.order_id DESC LIMIT 1")->order_id;
        dd($products);

        //Tao record cho order_detail
        foreach ($products as $key => $value) {

            $code = $value['code'];

            $number = $value['quantity'];

            $this->model->execute("INSERT INTO `tbl_order_detail`(`order_id`, `fk_product_id`, `c_number`) VALUES ('$order_id','$code','$number')");

            unset($_SESSION["cart"][$key]);
        }
        header("location: index.php?controller=checkout");
    }
}
