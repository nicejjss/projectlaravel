<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $productService;
    public function __construct(ProductService $productSevice)
    {
        $this->$productSevice = $productSevice;

    }
    public function index(){
            return view('home')->with(['posts'=>$this->productService->products()]);
    }
}
