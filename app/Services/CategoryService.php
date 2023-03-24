<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CategoryService
{
    public function index()
    {
        $categories = Category::where('visible', FLAG_ON)->paginate(PER_PAGE);

        foreach ($categories as $category)
        {
            $category->totalNumber = $category->products->count();
        }

        return $categories;
    }

    public function getAll()
    {
        return Category::where('visible', FLAG_ON)->get();
    }

    public function add($request)
    {
        Category::create([
            'name' => $request['name'],
            'home' => FLAG_OFF,
        ]);
    }

    public function view($id)
    {
        return Category::find($id);
    }

    public function edit($request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => data_get($request, 'name', ''),
            'home' => data_get($request, 'home', FLAG_OFF),
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->visible = FLAG_OFF;
        $category->save();
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
