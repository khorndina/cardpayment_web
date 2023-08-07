<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ProfileController;
use Illuminate\Support\Facades\Route;

// admin route
Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

// update profile route
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
