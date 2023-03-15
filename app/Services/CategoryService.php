<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryService
{

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
