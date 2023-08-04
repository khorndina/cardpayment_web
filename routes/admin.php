<?php

use App\Http\Controllers\backend\AdminController;
use Illuminate\Support\Facades\Route;

// admin route
Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

// when user submit form login
// Route::post('dashboard',[AdminController::class, 'dashboard'])->name('login');
