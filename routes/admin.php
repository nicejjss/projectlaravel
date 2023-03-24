<?php


use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('admin')->group(function () {

    Route::middleware('auth.user')->group(function () {

        Route::get("/", [HomeController::class, 'index'])->name('admin.home');

        Route::controller(CategoryController::class)->group(function () {

            Route::get('/categories', 'index')->name('admin.categories');

            Route::get('/category/add', 'addView')->name('admin.category.add');
            Route::post('/category/add', 'add');

            Route::get('/category/edit/{id?}', 'editView')->name('admin.category.edit');
            Route::put('category/edit/{id?}', 'edit');

            Route::get('/category/delete/{id?}', 'delete')->name('admin.category.delete');
        });

        Route::controller(ProductController::class)->group(function () {

            Route::get('/products', 'index')->name('admin.products');

            Route::get('/product/add', 'addView')->name('admin.product.add');
            Route::post('/product/add', 'add');

            Route::get('/product/edit/{id?}', 'editView')->name('admin.product.edit');
            Route::put('product/edit/{id?}', 'edit');

            Route::get('/product/delete/{id?}', 'delete')->name('admin.product.delete');

        });

        Route::controller(NewsController::class)->group(function () {
            Route::get('/news', 'index')->name('admin.news');

            Route::get('/news/add', 'addView')->name('admin.news.add');
            Route::post('/news/add', 'add');

            Route::get('/news/edit/{id?}', 'editView')->name('admin.news.edit');
            Route::put('/news/edit/{id?}', 'edit');

            Route::get('/news/delete/{id?}', 'delete')->name('admin.news.delete');
        });


        Route::controller(OrderController::class)->group(function () {

            Route::get('/orders', 'index')->name('admin.orders');

            Route::get('/order/detail/{id?}', 'detail')->name('admin.order.detail');

            Route::put('/orders/update', 'update')->name('admin.orders.update');

            Route::get('/order/delete/{id?}', 'delete')->name('admin.order.delete');
        });
    });

        Route::controller(LoginController::class)->group(function () {
            Route::get('/login', 'login')->name('admin.login');
            Route::post('login', 'check');
        });

        Route::get('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});
