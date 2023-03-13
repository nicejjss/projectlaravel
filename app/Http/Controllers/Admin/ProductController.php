<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->index();
        return view('admin.products.products')->with(['products' => $products]);
    }

    public function addView()
    {
        $listCate = $this->categoryService->getAll();
        return view('admin.products.add')->with(['listCate' => $listCate]);
    }

    public function add(Request $request)
    {

        $this->productService->add($request);
        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('admin.products');
    }
}
