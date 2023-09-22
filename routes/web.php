<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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
// fuctions for show
Route::get('/',[HomeController::class ,"index" ])->name("home.index");
Route::get('/category',[ShopController::class,"index"])->name('category.index');
Route::get('/contact',[ContactController::class,"index"])->name('contact.index');
Route::get('/cart',[ShopController::class,"cart"])->name('cart.cart');

// Routes for Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// FOR DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Login Route
Route::get('/loginn', [LoginController::class, 'loginn'])->name('loginn');

// Logout Route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//LOGIN
Route::get('/loginn', function () {
    return view('loginn');
})->name('loginn');

//REGISTER
Route::get('/registerr', function () {
    return view('registerr');
})->name('registerr');

// LOG OUT
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//EMAIL
Route::get('/send-email', [MailController::class, 'sendEmail'])->name('send.email');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/cart', 'CartController@index')->name('cart.index');

Route::post('/cart/remove/{productId}', 'CartController@removeFromCart');
Route::resource('products', ProductController::class);
return redirect()->route('products.index')->with('success', 'Product created successfully.');


