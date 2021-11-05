<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Models\Product\Product;
use App\Models\User\Distributor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\MenuController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\MaterialController;
use App\Http\Controllers\Product\StoreIncomingGoods;
use App\Http\Controllers\Order\CartController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\User\DistributorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routing home or landing page for every user
Route::get('/', [HomeController::class, 'index']);

// Routing authentication
Auth::routes(['register' => false, 'verify' => true]);

// Routing for authenticated user
Route::middleware('auth')->group(function () {

    // Routing for profile and edit profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'show'])->name('show');
        Route::put('edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
        Route::put('edit-password', [ProfileController::class, 'editPassword'])->name('edit-password');
        Route::put('edit-distributor', [ProfileController::class, 'editDistributor'])->name('edit-distributor');
    });

    // Routing for product related resources
    Route::get('product', [MenuController::class, 'index']);
    Route::prefix('product')->name('product.')->group(function () {
        // Routing for incoming goods
        Route::get('product/{product}/incoming-goods', function (Product $product)
        {
            return view('product.product.incoming_goods', ['product' => $product]);
        })->name('product.incoming_goods');
        Route::post('product/{product}/incoming-goods', StoreIncomingGoods::class)->name('product.incoming_goods.store');
        Route::resource('product', ProductController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('material', MaterialController::class);

    });

    // Route for order related
    Route::prefix('order')->name('order.')->group(function () {
        Route::prefix('order')->name('order.')->group(function () {
            Route::get('', [OrderController::class, 'index'])->name('index');
            Route::post('store-cart-to-order', [OrderController::class, 'storeCartToOrder'])->name('store_cart_to_order');
            Route::get('confirmation', [OrderController::class, 'showConfirmation'])->name('show_confirmation');
            Route::get('{order}', [OrderController::class, 'show'])->name('show');
        });
        Route::prefix('cart')->name('cart.')->group(function () {
            Route::get('', [CartController::class, 'index'])->name('index');
            Route::post('add/{product}', [CartController::class, 'add'])->name('add');
            Route::delete('remove/{product}', [CartController::class, 'remove'])->name('remove');
            Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
        });
    });
    // Routing for administrative actions
    Route::middleware('can:perform-administrative')->group(function () {

        // Routing for dashboard
        Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');

        // Routing for verify distributor with policy
        Route::get('distributor/{distributor}/verify', function (Distributor $distributor) {
            $distributor->verify();
            return redirect()->route('distributor.show', $distributor->user_id);
        })->name('distributor.verify')->middleware('can:verify, App\Models\User\Distributor');

        // Routing for distributor resource
        Route::resource('distributor', DistributorController::class);

        // Routing for user resource
        Route::resource('user', UserController::class);


    });
});

