<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\FlashSaleController;
use App\Http\Controllers\frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
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

// defualt route from laravel
// Route::get('/', function () {
//     return view('welcome');
// });

// Customize page home
// Route::get('/', function () {
//     return view('frontend.Home.home');
// });
Route::get('/',[HomeController::class, 'index'])->name('home');

// default from laravel
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// // admin route
// Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

// // vendor route
// Route::get('/vendor/dashboard',[VendorController::class, 'dashboard'])->middleware(['auth', 'role:vendor'])->name('vendor.dashboard');

// admin login route
Route::get('/admin/login',[AdminController::class, 'login'])->name('admin.login');

// customize for development
// Route::get('/dashboard', function () {
//     return view('frontend.dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

/**flash sale route */
Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale.index');

/**show Product detail route */
Route::get('product-detail/{slug}',[FrontendProductController::class, 'showProduct'])->name('product-detail.showProduct');

/**cart route */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'cartDetail'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart-details.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('cart-remove/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('get-cart-product', [CartController::class, 'getCartProducts'])->name('get-cart-product');

/**user profile route */
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'ProfileUpdate'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'UpdatePassword'])->name('profile.update.password');

    // address route
    Route::resource('address', UserAddressController::class);
});
