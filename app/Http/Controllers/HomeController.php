<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productSevice,CategoryService $categoryService)
    {
        $this->productService = $productSevice;
        $this->categoryService = $categoryService;
    }
    public function index(){
        $posts = $this->productService->products();
        $categories =$this->categoryService->categories_home();
        return view('home')->with(['posts'=>$posts,'categories'=> $categories]);
    }
}
