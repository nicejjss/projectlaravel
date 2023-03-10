<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CategoryService
{
    public function index()
    {
        config()->set('database.connections.mysql.strict', false);
        \DB::reconnect();

        $categories = Category::select('categories.name', 'categories.home', 'categories.id', DB::raw('COUNT(products.id) as `total_number`'))
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')->groupBy('categories.id')->get();

        config()->set('database.connections.mysql.strict', true);
        \DB::reconnect();

        return $categories;
    }
}
