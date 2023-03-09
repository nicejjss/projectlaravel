<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $productService;

    public function __construct(ProductService $productService)
    {
       $this->productService = $productService;
    }

    public function index(){
        $products = $this->productService->products();
            return view('home')->with(['products'=>$products]);
    }
    public function showWithCate($id){
        $category = Category::where('id',$id)->first();
        $products = $this->productService->showWithCate($id);
        return view('frontend.products.products')->with(['products'=>$products,'category'=>$category]);
    }

    public function find($id){
        $product = $this->productService->find($id);
        return view('frontend.products.product_detail')->with(['product'=>$product]);
    }

    public function findWithSearch($data){
        $products = $this->productService->findithSearch($data);
        return view('frontend.search.search')->with(['search'=>$data,'products'=>$products]);
    }

}
