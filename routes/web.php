<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    // category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create','create');
        Route::post('/category',  'store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}',  'update');
    });

    // product
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index');
        Route::get('/product/create','create');
        Route::post('/product', 'store');
        Route::get('/product/{product}/edit','edit');
        Route::put('/product/{product}',  'update');
        Route::get('/product/{product}/delete','destroy');

        Route::get('/product-image/{image_id}/delete','destroyImage');
    });

    // brand
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

    // color
    Route::controller(ColorController::class)->group(function () {
        Route::get('/color', 'index');
        Route::get('/color/create','create');
        Route::post('/color/create','store');
        Route::get('/color/{color}/edit','edit');
        Route::put('/color/{color}',  'update');
        Route::get('/color/{color}/delete',  'delete');
    });
});
