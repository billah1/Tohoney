<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/', function () {
    return view('Frontend.pages.home');
});

// Admin Auth Route
Route::prefix('admin/')->group(function(){
  Route::get('login',[LoginController::class,'loginpage'])->name('admin.loginpage');
  Route::post('login',[LoginController::class,'login'])->name('admin.login');
  Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

  Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
  });

  Route::resource('category',CategoryController::class);

});
// Admin Auth Route


