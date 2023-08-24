<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminVendorProfileController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ChildCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductImageGalleryController;
use App\Http\Controllers\backend\ProductVariantItemController;
use App\Http\Controllers\backend\ProductVariantontroller;
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

// child-Category route
Route::put('child-category/change-status', [ChildCategoryController::class, 'changestatus'])->name('child-category.changestatus');
Route::get('child-category/get-subcategory', [ChildCategoryController::class, 'getSubCategory'])->name('child-category.getSubCategory');
Route::resource('child-category', ChildCategoryController::class);

// Brand route
Route::put('brand/change-status', [BrandController::class, 'changestatus'])->name('brand.changestatus');
Route::resource('brand', BrandController::class);

// admin vendor profile route for display in sidebar
Route::resource('vendor-profile', AdminVendorProfileController::class);

// Product route
// Route::put('sub-category/change-status', [SubCategoryController::class, 'changestatus'])->name('sub-category.changestatus');
Route::get('products/get-subcategory', [ProductController::class, 'getSubCategory'])->name('products.getSubCategory');
Route::get('products/get-childcategory', [ProductController::class, 'getChildCategory'])->name('products.getChildcategory');
Route::resource('products', ProductController::class);

// Product Image Gallery Route
Route::get('product-image-gallery/{id}', [ProductImageGalleryController::class, 'showTable'])->name('product-image-gallery.showtable');
Route::resource('product-image-gallery', ProductImageGalleryController::class);

// Product Variant Route
Route::get('product-variant/{id}', [ProductVariantontroller::class, 'showTable'])->name('product-variant.showtable');
Route::get('product-variant/create/{id}', [ProductVariantontroller::class, 'createVariant'])->name('product-variant.create-varian');
Route::put('product-variant/change-status', [ProductVariantontroller::class, 'changestatus'])->name('product-variant.changestatus');
Route::resource('product-variant', ProductVariantontroller::class);

// Product Variant items Route
Route::get('product-variant-item/{productid}/{variantid}',[ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
