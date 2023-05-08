<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\receivingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\userController;
use App\Http\Controllers\inventoryController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);

    Route::resource('inventory', inventoryController::class);
    Route::resource('receiving', receivingController::class);
    Route::resource('user-setup', userController::class);

    Route::get('/search',[receivingController::class, 'search'])->name('searchbar');
   

    Route::get('/direct-receiving',[receivingController::class, 'directReceiving'])->name('directReceiving');

    Route::get('/search-product',[ProductController::class, 'search']);
   
    // Route::get('/user-setup/index-user',[userController::class,'index']);
    // Route::get('/user-setup/edit-user',[userController::class,'edit']);
    // Route::put('/user-setup/update-user',[userController::class,'update']);

    // Route::get('/user-setup/show-user{id}',[userController::class,'show']);
    
    
    // Route::post('/user-saved', [userController::class, 'saved'])->name('saved');
    // Route::get('/user-setup/index',[userController::class,'index']);
    // Route::get('/user-setup/show',[userController::class,'show'])->name('user-setup.show');
    //  Route::put('/user-setup', [userController::class, 'update'])->name('user-setup.update');
    // Route::get('/user-setup/edit',[userController::class,'edit'])->name('user-setup.edit');      
    // Route::post('/user-setup/update', [userController::class, 'update']);
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);
});
