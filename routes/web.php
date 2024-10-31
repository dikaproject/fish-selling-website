<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Web3AuthController;
use App\Http\Controllers\Web\Admin\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\Web\Carts\CartController;

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
    return view('pages.user.home');
})->name('home');

Route::post('/login/metamask', [Web3AuthController::class, 'login']);

// routes/web.php

Route::post('/verify', [TransactionController::class, 'verifyTransaction']);

Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}/buy', [UserProductController::class, 'buy'])->name('products.buy');
Route::post('/complete-free-order', [TransactionController::class, 'completeFreeOrder'])->name('completeFreeOrder');
Route::post('/create-order', [TransactionController::class, 'createOrder']);
Route::get('/success', function () {
    return view('success');
})->name('success');

Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
Route::post('/midtrans/notification', [TransactionController::class, 'notificationHandler'])->name('midtrans.notification');

Route::group(['middleware' => ['web']], function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [TransactionController::class, 'viewCheckout'])->name('checkout.view');

    Route::get('/checkout', [TransactionController::class, 'viewCheckout'])->name('checkout.view');
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');

    Route::get('/payment/success', [TransactionController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/pending', [TransactionController::class, 'paymentPending'])->name('payment.pending');
    Route::get('/payment/failed', [TransactionController::class, 'paymentFailed'])->name('payment.failed');

});
