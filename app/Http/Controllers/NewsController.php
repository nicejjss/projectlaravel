<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsservice;
    public function __construct(NewsService $newsservice)
    {
        $this->newsservice=$newsservice;
    }

    public function index(){
        $list_new = $this->newsservice->index();
        return view('frontend.news.news')->with('list_news',$list_new);
    }
}
