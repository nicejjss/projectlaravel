<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        $listNews = $this->newsService->index();
        return view('admin.news.news')->with(['listNews' => $listNews]);
    }

    public function addView()
    {
        return view('admin.news.add');
    }

    public function add(NewsRequest $request)
    {
        $this->newsService->add($request);
        return redirect()->route('admin.news');
    }

    public function editView($id)
    {
        $news = $this->newsService->view($id);
        return view('admin.news.edit')->with(['news'=>$news]);
    }

    public function edit(NewsRequest $request, $news)
    {
        $news = $this->newsService->view($news);
        $this->newsService->edit($request, $news);
        return redirect()->route('admin.news');
    }

    public function delete($id)
    {
        $this->newsService->delete($id);
        return redirect()->route('admin.news');
    }
}
