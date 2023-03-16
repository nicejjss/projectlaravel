<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    public function index(){
        return Product::select('products.id','img','products.name as product_name','categories.name as category_name','price')
            ->join('categories','categories.id','=','products.category_id')->paginate(PER_PAGE);
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
    }

    public function getAll(){
        return Category::all();
    }


    public function create(array $data)
    {
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function update(array $data, int $id)
    {

    }

    public function remove($id)
    {

    }

    public function getPostsByType(int $type)
    {

    }
}
