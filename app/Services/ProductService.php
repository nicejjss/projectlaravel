<?php


namespace App\Services;



use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ProductService
{

    public function index()
    {
        return Product::select('products.id', 'img', 'products.name as product_name', 'categories.name as category_name', 'price')
            ->join('categories', 'categories.id', '=', 'products.category_id')->paginate(PER_PAGE);
    }

    public function add($request)
    {

        $data = $request->all();
        $imgName = time() . $data['img']->getClientOriginalName();
        $request->img->move(public_path('upload/product/'), $imgName);
        Product::create([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'content' => $data['content'],
            'img' => $imgName,
            'price' => $data['price'],
        ]);
    }

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

    public function view($id)
    {
        return Product::find($id);
    }


    public function edit($request, $product)
    {
        $data = $request->all();
        if (File::exists(public_path('upload/product/' . $product->img))) {
            File::delete(public_path('upload/product/' . $product->img));
        }
        $imgName = time() . $data['img']->getClientOriginalName();
        $request->img->move(public_path('upload/product/'), $imgName);
        $product->update([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'content' => $data['content'],
            'img' => $imgName,
            'price' => $data['price'],
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function hotProducts()
    {
        config()->set('database.connections.mysql.strict', false);
        DB::reconnect();

        $products = Product::select('*', DB::raw('sum(order_details.number) as totalnumber'))
            ->join('order_details', 'order_details.product_id', 'products.id')->groupBy('products.id')->orderByDesc('totalnumber')->get()->toArray();

        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();

        $products = $this->paginate($products);

        return $products;
    }

    public function paginate($collection, $perPage = PER_PAGE, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($collection);
        $currentPage = $page;
        $offset = ($currentPage * $perPage) - $perPage;
        $itemsToShow = array_slice($collection, $offset, $perPage);
        return new LengthAwarePaginator($itemsToShow, $total, $perPage);
    }
}
