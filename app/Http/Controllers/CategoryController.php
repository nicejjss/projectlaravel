<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $categoryService;
    public function __construct(CategoryService $categoryService )
    {
        $this->categoryService = $categoryService;
    }

    public function Category_home(){
        $categories = $this->categoryService->categories_home();
        dd($categories);
        return view('frontend.category')->with(['categories'=>$categories]);
    }
}
