<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\OrderCheckController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ProductDetailController;
use App\Http\Controllers\User\OrderController;


// Route mặc định trỏ đến trang chủ
// Route::get('/home', [CustomAuthController::class, 'index'])->name('home'); // Đưa ra trang home

// Route hiển thị form đăng nhập và xử lý đăng nhập
Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'customLogin'])->name('login.submit');

// Route hiển thị form đăng ký và xử lý đăng ký
Route::get('/register', [CustomAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CustomAuthController::class, 'register'])->name('register.submit');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// Route hiển thị sản phẩm
Route::get('/phone', [ProductController::class, 'another_phone'])->name('phone');
Route::get('/apple', [ProductController::class, 'phone_apple'])->name('phone_apple');
Route::get('/samsung', [ProductController::class, 'phone_samsung'])->name('phone_samsung');
Route::get('/google', [ProductController::class, 'phone_google'])->name('phone_google');
Route::get('/xiaomi', [ProductController::class, 'phone_xiaomi'])->name('phone_xiaomi');
Route::get('/asus', [ProductController::class, 'phone_asus'])->name('phone_asus');
Route::get('/tablet', [ProductController::class, 'tablet'])->name('tablet');
Route::get('/tablet/apple', [ProductController::class, 'tablet_apple'])->name('tablet_apple');
Route::get('/tablet/xiaomi', [ProductController::class, 'tablet_xiaomi'])->name('tablet_xiaomi');
// Route thông tin sản phẩm
Route::get('/product_detail/{id}', [ProductDetailController::class, 'product_detail'])->name('product_detail');
Route::post('/phone/store', [ProductDetailController::class, 'store'])->name('product_detail_store');
// Route kiểm tra đơn hàng
Route::get('/oder_check',[OrderCheckController::class, 'oder_check'])->name('oder_check');
// Route  giỏ hàng
Route::get('/showCart', [CartController::class, 'showCart'])->name('showCart');
Route::get('/AddCart/{id}', [CartController::class, 'AddCart'])->name('AddCart');

Route::get('/AddCartNow/{id}', [CartController::class, 'AddCartNow']);
Route::get('/DeleteItemCart/{id}', [CartController::class, 'DeleteItemCart']);

Route::get('/DeleteItemCart/{id}', [CartController::class, 'DeleteItemCart'])->name('DeleteItemCart');
Route::get('/AddItemCart/{id}', [CartController::class, 'AddItemCart'])->name('AddItemCart');
Route::get('/DeleteItemListCart/{id}', [CartController::class, 'DeleteItemListCart'])->name('DeleteItemListCart');
Route::get('/MinusItemCart/{id}', [CartController::class, 'MinusItemCart'])->name('MinusItemCart');
Route::get('/order_detail', [OrderController::class, 'order_detail'])->name('order_detail');
Route::post('/AddOder', [OrderController::class, 'AddOder'])->name('AddOder');
//
Route::get('/home', [ProductController::class, 'show'])->name('home');
Route::get('/phone', [App\Http\Controllers\User\ProductController::class, 'phone'])->name('phone');
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'acc'])->name('account');
    Route::patch('/account/update/{id}', [AccountController::class, 'update'])->name('acc_update');
    Route::get('/order_management', [AccountController::class, 'order_management'])->name('order_management');
    Route::get('/change_password', [AccountController::class, 'change_password'])->name('change_password');
    Route::patch('/change_password/updatePassword', [AccountController::class, 'updatePassword'])->name('updatePassword');
});
