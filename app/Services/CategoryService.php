<?php


namespace App\Services;



use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryService{

    public function categories_home()
    {
        return Category::where('home',1)->get();
    }
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
