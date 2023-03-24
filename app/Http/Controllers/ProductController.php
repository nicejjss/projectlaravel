<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->products();
        return view('home')->with(['products' => $products]);
    }

    public function showWithCate($id)
    {
        $products = $this->productService->showWithCate($id);
        $category = Category::find($id);
        return view('frontend.products.products')->with(['products' => $products, 'category' => $category]);
    }

    public function find($id)
    {
        $product = $this->productService->view($id);
        return view('frontend.products.product_detail')->with(['product' => $product]);
    }

    public function findWithSearch(Request $request)
    {
        $products = $this->productService->findWithSearch($request->input('search'));
        return view('frontend.search.search')->with(['search' => $request->input('search'), 'products' => $products]);
    }


}
