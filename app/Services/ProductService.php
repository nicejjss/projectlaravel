<?php


namespace App\Services;


use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Console\Style\table;

class ProductService
{

    public function findWithSearch($data)
    {
        return Product::where('name', 'like', '%' . $data . '%')->paginate(PER_PAGE);
    }

    public function products()
    {
        return Product::paginate(PER_PAGE);
    }

    public function showWithCate($id)
    {
        return Product::where('category_id', $id)->paginate(PER_PAGE);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    //create product
    public function create(array $data)
    {


    }

    public function hotProducts()
    {
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();

        $products = Product::select('*', DB::raw('sum(order_details.number) as totalnumber'))
            ->join('order_details', 'order_details.product_id', 'products.id')->groupBy('products.id')->orderByDesc('totalnumber')->get();

        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();

        dd($products->chunk);
        return $products;
    }

}
