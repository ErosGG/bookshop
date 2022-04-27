<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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


//Route::domain('admin.'.env('APP_DOMAIN'))
//    ->middleware(['web', 'auth', 'admin',])
//    ->group(base_path('routes/admin.php'));


Route::prefix('/admin')
//    ->middleware(['web',])
    ->middleware(['web', 'auth', 'admin',])
    ->group(base_path('routes/admin.php'));


//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [ShopController::class, 'index'])->name('shop');


Route::get('/home', [ShopController::class, 'index'])->name('shop.home');


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');


Route::get('/search', [ShopController::class, 'search'])->name('shop.search');


Route::get('/category/{category:slug}', [ShopController::class, 'products'])->name('shop.category.products');


Route::get('/categories', [ShopController::class, 'categories'])->name('shop.categories');


Route::get('/product/{product:slug}', [ShopController::class, 'product'])->name('shop.product.show');


Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');


Route::post('/cart/add/{product}', [ShopController::class, 'addToCart'])->name('shop.cart.add');


Route::get('cart/remove/{product}', [ShopController::class, 'removeFromCart'])->name('shop.cart.remove');


//Route::get('/checkout', [ShopController::class, 'checkout'])
//    ->middleware(['auth',])
//    ->name('shop.checkout');
//
//
//Route::post('/checkout', [ShopController::class, 'payment'])
//    ->middleware(['auth',])
//    ->name('shop.payment');
//
//
//Route::get('/thankyou', [ShopController::class, 'thankyou'])
//    ->middleware(['auth',])
//    ->name('shop.thankyou');


Route::get('/user/{user:uuid}/profile', [ShopController::class, 'profile'])
    ->middleware(['auth',])
    ->name('shop.user.profile');


Route::get('/user/{user::uuid}/profile/edit', [ShopController::class, 'editProfile'])
    ->middleware(['auth',])
    ->name('shop.user.profile.edit');


Route::post('/user/{user}/profile/update', [ShopController::class, 'updateProfile'])
    ->middleware(['auth',])
    ->name('shop.user.profile.update');


Route::get('/user/{user:uuid}/orders', [ShopController::class, 'orders'])
    ->middleware(['auth',])
    ->name('shop.user.orders');


Route::get('/user/{user:uuid}/orders/{order}', [ShopController::class, 'order'])
    ->middleware(['auth',])
    ->name('shop.user.order');


Route::get('/user/{user}/orders/{order}/invoice', [ShopController::class, 'orderInvoice'])
    ->middleware(['auth',])
    ->name('shop.user.order.invoice');


Route::get('/user/{user}/orders/{order}/receipt', [ShopController::class, 'orderReceipt'])
    ->middleware(['auth',])
    ->name('shop.user.order.receipt');


Route::get('/user/{user}/orders/{order}/cancel', [ShopController::class, 'orderCancel'])
    ->middleware(['auth',])
    ->name('shop.user.order.cancel');


Route::get('/user/{user}/orders/{order}/refund', [ShopController::class, 'orderRefund'])
    ->middleware(['auth',])
    ->name('shop.user.order.refund');


Route::get('/user/{user}/orders/{order}/shipped', [ShopController::class, 'orderShipped'])
    ->middleware(['auth',])
    ->name('shop.user.order.shipped');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
