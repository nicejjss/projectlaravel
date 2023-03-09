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

    public function __construct(ProductService $productService,CategoryService $categoryService)
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
        $category = $this->categoryService->find($id);
        return view('frontend.products.products')->with(['products' => $products, 'category' => $category]);
    }

    public function find($id)
    {
        $product = $this->productService->find($id);
        return view('frontend.products.product_detail')->with(['product' => $product]);
    }

    public function findWithSearch($data)
    {
        $products = $this->productService->findWithSearch($data);
        return view('frontend.search.search')->with(['search' => $data, 'products' => $products]);
    }
    public function hotProducts(){
        $products = $this->productService->hotProducts();
    }
}
