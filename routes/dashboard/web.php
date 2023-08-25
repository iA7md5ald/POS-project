<?php


use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Client\OrderController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

        // Category routes
        Route::resource('/categories', CategoryController::class)->except(['show']);

        //product routes
        Route::resource('/products', ProductController::class)->except(['show']);

        //Client routes
        Route::resource('/clients', ClientController::class)->except(['show']);
        Route::resource('/clients.orders', OrderController::class)->except(['show']);

        //order routes
        Route::resource('/orders' , \App\Http\Controllers\Dashboard\OrderController::class)->except('show');
        Route::get('/orders/{order}/products' , [\App\Http\Controllers\Dashboard\OrderController::class , 'products'])->name('orders.products');

        // User routes
        Route::resource('/users', UserController::class)->except(['show']);


    }); // end of dashboard routes
});



