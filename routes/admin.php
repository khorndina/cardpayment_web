<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ChildCategoryController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

// admin route
Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

// update profile route
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');

// Slider route
Route::resource('slider', SliderController::class);

// Category route
Route::put('change-status', [CategoryController::class, 'changestatus'])->name('category.changestatus');
Route::resource('category', CategoryController::class);

// Sub-Category route
Route::put('sub-category/change-status', [SubCategoryController::class, 'changestatus'])->name('sub-category.changestatus');
Route::resource('sub-category', SubCategoryController::class);

// Sub-Category route
Route::put('child-category/change-status', [ChildCategoryController::class, 'changestatus'])->name('child-category.changestatus');
Route::get('child-category/get-subcategory', [ChildCategoryController::class, 'getSubCategory'])->name('child-category.getSubCategory');
Route::resource('child-category', ChildCategoryController::class);
