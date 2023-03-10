<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(){
        $categories = $this->categoryService->index();
        return view('admin.categories.categories')->with(['categories'=>$categories]);
    }

    public function addView(){
        return view('admin.categories.add_edit');
    }

    public function add(CategoryRequest $request){
        $this->categoryService->add($request);
        return redirect()->route('admin.categories');
    }

    public function delete($id){
        $this->categoryService->delete($id);
        return redirect()->route('admin.categories');
    }
}
