<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
