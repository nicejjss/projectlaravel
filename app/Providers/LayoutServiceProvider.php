<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Slider;
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
        View::composer(['layouts.layout'], function ($view) {

            $newsList = News::index();
            $sliders = Slider::index();
            $categories = Category::cateHome();
            $cartProducts = session()->get('cart');
            $total = 0;
            if (!empty($cartProducts)) {
                foreach ($cartProducts as $cartProduct) {
                    $total += $cartProduct['quantity'];
                }
            }

            $view->with(['categories' => $categories, 'news' => $newsList, 'sliders' => $sliders, 'total' => $total, 'cartProducts' => $cartProducts]);
        });
    }
}
