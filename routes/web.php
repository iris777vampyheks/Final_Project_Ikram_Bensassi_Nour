<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Shop and Categories
Route::get('/category', [ShopController::class, 'index'])->name('category.index');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Cart Page
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.cart');

// Product Routes
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

// Authentication Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Logout
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

// Email Route
Route::get('/send-email', [MailController::class, 'sendEmail'])->name('send.email');

// Cart Routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart/remove/{productId}', 'CartController@removeFromCart');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Show admin dashboard
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Product CRUD
    Route::resource('products', ProductController::class);


    // Image upload
    Route::post('products/{product}/images', 'ProductController@uploadImage')->name('products.images.upload');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('products', 'AdminController');
});

Route::resource('products', ProductController::class);
// Redirect
Route::resource('products', ProductController::class);
return redirect()->route('products.index')->with('success', 'Product created successfully.');
