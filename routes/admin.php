<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SliderController;
use Illuminate\Support\Facades\Route;

// admin route
Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

// update profile route
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');

// Slider route
Route::resource('slider', SliderController::class);
