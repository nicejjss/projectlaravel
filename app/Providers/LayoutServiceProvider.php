<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\NewsService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LayoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $categoryservice = new CategoryService();
        $news =new NewsService();

        $categories = $categoryservice->categories_layout();
        $news_list = $news->news_layout();

        View::composer(['layouts.layout'],function ($view) use ($categories,$news_list) {
            $view->with(['categories'=>$categories,'news'=>$news_list]);
        });
    }
}
