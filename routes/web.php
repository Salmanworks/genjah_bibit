<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/api/search', [SearchController::class, 'search'])->name('api.search');

Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/kategori', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/kategori/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');

Route::middleware(['auth'])->group(function () {
    Route::get('/pesanan', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/produk/{product}/pesan', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/pesanan', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/pesanan/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::patch('/pesanan/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/pesanan/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/pesanan/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('blogs', AdminBlogController::class);

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('settings/footer', [SettingController::class, 'footer'])->name('settings.footer');
    Route::post('settings/footer', [SettingController::class, 'updateFooter'])->name('settings.footer.update');
    Route::get('settings/about', [SettingController::class, 'about'])->name('settings.about');
    Route::post('settings/about', [SettingController::class, 'updateAbout'])->name('settings.about.update');
});

Route::get('/masuk', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
Route::post('/masuk', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');
Route::post('/keluar', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');

Route::get('/auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::get('/daftar', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('/daftar', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

Route::get('/test-auth', fn () => view('test_auth'))->name('test.auth');

require __DIR__.'/settings.php';
