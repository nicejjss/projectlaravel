<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
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
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')->groupBy('categories.id')->get()->toArray();

        config()->set('database.connections.mysql.strict', true);
        \DB::reconnect();

        $categories = $this->paginate($categories);

        return $categories;
    }

    public function add()
    {


    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
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
