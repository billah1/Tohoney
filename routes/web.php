<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\Auth\RegisterController;

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

// Route::get('/dashboard', function () {
//     return view('Backend.pages.dashboard');
// });

// Route::get('/', function () {
//     return view('Frontend.pages.home');
// });
Route::prefix('')->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/shop',[HomeController::class,'shopPage'])->name('shop.page');
    Route::get('/single-product/{product_slug}',[HomeController::class,'productDetails'])->name('productdetail.page');
    Route::get('/shopping-cart',[CartController::class,'cartPage'])->name('cart.page');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to.cart');
    Route::get('/remove-from-cart/{cart_id}', [CartController::class, 'removeFromCart'])->name('removefrom.cart');

        /*Authentication */
     Route::get('/register', [RegisterController::class, 'registerPage'])->name('register.page');
     Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');
     Route::get('/login', [RegisterController::class, 'loginPage'])->name('login.page');
     Route::post('/login', [RegisterController::class, 'loginStore'])->name('login.store');

     Route::prefix('customer/')->middleware(['auth', 'is_customer'])->group(function(){
        Route::get('dashboard',[CustomerController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('logout', [RegisterController::class, 'logout'])->name('customer.logout');

        // coupon
        Route::post('cart/apply-coupon',[CartController::class,'couponApply'])->name('customer.couponapply');
        Route::get('cart/remove-coupon/{coupon-name}',[CartController::class,'removeCoupon'])->name('customer.couponremove');
     });

});

// Admin Auth Route
Route::prefix('admin/')->group(function(){
  Route::get('login',[LoginController::class,'loginpage'])->name('admin.loginpage');
  Route::post('login',[LoginController::class,'login'])->name('admin.login');
  Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

  Route::middleware(['auth','is_admin'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

});

  Route::resource('category',CategoryController::class);
  Route::resource('testimonial',TestimonialController::class);
  Route::resource('products',ProductController::class);
  Route::resource('Coupon',CouponController::class);

});
// Admin Auth Route


