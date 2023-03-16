<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    protected $productService;

    public function __construct(ProductService $productSevice)
    {
        $this->productService = $productSevice;
    }

    public function index()
    {
        $products = $this->productService->hotProducts();
        return view('home')->with(['products' => $products]);
    }
}
