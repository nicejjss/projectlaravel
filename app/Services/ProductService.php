<?php


namespace App\Services;


use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
}
