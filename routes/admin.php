<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
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

    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('admin.login');
        Route::post('login', 'check');
    });

    Route::controller(CategoryController::class)->group(function () {

        Route::get('/categories', 'index')->name('admin.categories');

        Route::get('/category/add', 'addView')->name('admin.category.add');
        Route::post('/category/add', 'add');

        Route::get('/category/edit/{id?}', 'editView')->name('admin.category.edit');
        Route::put('category/edit/{id?}','edit');

        Route::get('/category/delete/{id?}', 'delete')->name('admin.category.delete');
    });

    Route::get('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});
