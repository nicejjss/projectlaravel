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
        //TODO: sua sau khi co order
        $posts = $this->productService->products();
        return view('home')->with(['products'=>$posts]);
    }
}
