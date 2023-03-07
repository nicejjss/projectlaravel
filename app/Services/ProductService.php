<?php


namespace App\Services;



use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductService{
    //show product
    //TODO: constant product per page

    public  function  findithSearch($data){
        return Product::where('name','like','%'.$data.'%')->paginate(config('constants.PAGE'));
    }
    public function products()
    {
        return Product::paginate(config('constants.PAGE'));
    }
    public  function showWithCate($id){
        return Product::where('category_id',$id)->paginate(config('constants.PAGE'));
    }
    //create product
    public function create(array $data)
    {


    }

    public function find($id)
    {
        return Product::find($id);
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
