<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/alamat', [ProfileController::class, 'update_alamat'])->name('update_alamat');

    //Thread
    Route::get('/thread', [ThreadController::class, 'index'])->name('index.thread');
    Route::get('/thread/create', [ThreadController::class, 'create'])->name('create.thread');
    Route::post('/thread/store', [ThreadController::class, 'store'])->name('store.thread');
    Route::get('/thread/{id}', [ThreadController::class,'show'])->name('show.thread');

    //Komentar
    Route::post('/thread/{id}', [ThreadController::class, 'add_komentar'])->name('add.komentar');
    Route::delete('/thread/{id}', [ThreadController::class, 'delete_komentar'])->name('delete.komentar');
    Route::post('/thread/{id}/reply', [ThreadController::class, 'add_reply'])->name('add.reply');
    Route::delete('/thread/{id}/reply', [ThreadController::class, 'delete_reply'])->name('delete.reply');

    //Like
    Route::post('/thread/{id}/like', [ThreadController::class, 'like'])->name('like.thread');
    Route::post('/thread/{id}/unlike', [ThreadController::class, 'unlike'])->name('unlike.thread');

    //Toko
    Route::get('/toko/create', [TokoController::class, 'create_toko'])->name('create.toko');
    Route::get('/toko', [TokoController::class, 'index'])->name('index.toko');
    Route::get('/toko/{id}', [TokoController::class,'show'])->name('show.toko');;
    Route::post('/toko/store', [TokoController::class,'store'])->name('store.toko');
    Route::get('/toko/{id}', [TokoController::class, 'show'])->name('show.toko');

    //Product
    Route::get('/product/create', [ProductController::class, 'create'])->name('create.product');
    Route::get('/product', [ProductController::class, 'index'])->name('index.product');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('show.product');
    Route::post('/product/create', [ProductController::class, 'store'])->name('store.product');
    Route::post('/product/{wishlistId}/wishlist', [WishListController::class, 'addProductToWishlist'])->name('add.wishlist');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    //order
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}/tenant', [OrderController::class, 'showTenant'])->name('orders.showTenant');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/order/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/vendor-order', [OrderController::class, 'showOrdersForOwnedProducts'])->name('vendor.order');
    Route::post('/order/{id}', [OrderController::class, 'saveRating'])->name('orders.rate');
});



require __DIR__.'/auth.php';
