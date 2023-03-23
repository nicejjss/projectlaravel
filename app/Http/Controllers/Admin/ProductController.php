<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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

    public function add(ProductRequest $request)
    {
        $this->productService->add($request->validated());
        return redirect()->route('admin.products');
    }

    public function editView($id)
    {
        $product = $this->productService->view($id);
        $listCate = $this->categoryService->getAll();
        return view('admin.products.edit')->with(['product' => $product, 'listCate' => $listCate]);
    }

    public function edit(ProductRequest $request, $product)
    {
        $this->productService->edit($request, $product);
        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('admin.products');
    }
}
