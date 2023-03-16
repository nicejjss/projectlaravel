<?php


use App\Http\Controllers\Admin\CustomerController;
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


        Route::controller(LoginController::class)->group(function () {
            Route::get('/login', 'login')->name('admin.login');
            Route::post('login', 'check');
        });

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
            Route::put('/product/edit/{id?}', 'edit');


            Route::get('/products/delete/{id?}', 'delete')->name('admin.product.delete');
        });

    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index')->name('admin.customers');

    });

    Route::get('/logout', [LogoutController::class, 'logout'])->name('admin.logout');

});
