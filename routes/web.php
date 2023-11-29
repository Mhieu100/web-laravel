<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/shop', [App\Http\Controllers\Frontend\FrontendController::class, 'shop']);
Route::get('/search', [App\Http\Controllers\Frontend\FrontendController::class, 'searchProducts']);
Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'collections']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);
    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'update']);
    Route::get('change-pass', [App\Http\Controllers\Frontend\UserController::class, 'change_pass']);
    Route::post('change-pass', [App\Http\Controllers\Frontend\UserController::class, 'edit_pass']);
});

Route::get('/thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create', 'store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'delete');
    });

    // Category routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product}/delete', 'destroy');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');

        Route::post('product-color/{product_color_id}', 'updateProdColorQty');
        Route::get('product-color/{product_color_id}/delete', 'deleteProdColor');
    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}', 'update');
        Route::get('/colors/{color}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        Route::get('/invoice/{orderId}/mail', 'sendMail');
    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user}/edit', 'edit');
        Route::put('/users/{user}', 'update');
        Route::get('/users/{user}/delete', 'destroy');
    });

    // Brand routes
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);
});