<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Routes
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');

// Category Routes
Route::get('/kategori', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/kategori/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Page Routes
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');

// Order Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/pesanan', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/produk/{product}/pesan', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/pesanan', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/pesanan/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/pesanan/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

// Admin Routes - PROTECTED: Hanya user dengan is_admin = true yang bisa akses
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
});

// Auth Routes
Route::get('/masuk', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
Route::post('/masuk', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');
Route::post('/keluar', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');

// Google OAuth Routes
Route::get('/auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::get('/daftar', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('/daftar', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

// Test Auth Route (untuk debugging)
Route::get('/test-auth', function () {
    return view('test_auth');
})->name('test.auth');

// Orders are already defined above with auth middleware

require __DIR__.'/settings.php';
