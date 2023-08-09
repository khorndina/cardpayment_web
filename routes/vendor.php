<?php

use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\backend\VendorProfileController;
use Illuminate\Support\Facades\Route;

// vendor route
Route::get('dashboard',[VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'ProfileUpdate'])->name('profile.update');
Route::post('profile', [VendorProfileController::class, 'UpdatePassword'])->name('profile.update.password');
