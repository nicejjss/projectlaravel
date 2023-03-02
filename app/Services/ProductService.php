<?php


namespace App\Services;



use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductService{
    //show product
   protected $properpage = 4;

    public  function gethotproducts(){

    }
    public function products()
    {
        return Product::all();
    }
    //create product
    public function create(array $data)
    {


    }

    public function find($id)
    {

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
