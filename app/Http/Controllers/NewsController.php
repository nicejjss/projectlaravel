<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;
    public function __construct(NewsService $newsService)
    {
        $this->newsService=$newsService;
    }

    public function index(){
        $list_new = $this->newsService->index();
        return view('frontend.news.news')->with('list_news',$list_new);
    }
}
