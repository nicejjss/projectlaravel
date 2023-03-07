<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Slider;
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
        View::composer(['layouts.layout'],function ($view){

            $news_list = (new News())->index();
            $sliders = (new Slider())->index();
            $categories = (new Category())->cateHome();

            $cart_products = session()->get('cart');
            $total = 0;
            if(!empty($cart_products)){
                foreach ($cart_products as $cart_product){
                    $total += $cart_product['quantity'];
                }
            }

            $view->with(['categories'=>$categories,'news'=>$news_list,'sliders'=>$sliders,'total'=>$total,'cart_products'=>$cart_products]);
        });
    }
}
