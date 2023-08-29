<?php

use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\backend\VendorProductController;
use App\Http\Controllers\backend\VendorProductImageGalleryController;
use App\Http\Controllers\backend\VendorProductVariantController;
use App\Http\Controllers\backend\VendorProductVariantItemController;
use App\Http\Controllers\backend\VendorProfileController;
use App\Http\Controllers\backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

// vendor route
Route::get('dashboard',[VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'ProfileUpdate'])->name('profile.update');
Route::post('profile', [VendorProfileController::class, 'UpdatePassword'])->name('profile.update.password');

// Shop profile route for Vendor User
Route::resource('shop-profile', VendorShopProfileController::class);

// Product route for Vendor User
Route::get('products/get-subcategory', [VendorProductController::class, 'getSubCategory'])->name('products.getSubCategory');
Route::get('products/get-childcategory', [VendorProductController::class, 'getChildCategory'])->name('products.getChildcategory');
Route::put('products/change-status', [VendorProductController::class, 'changestatus'])->name('products.changestatus');
Route::resource('products', VendorProductController::class);

// Product Image Gallery Route
Route::get('product-image-gallery/{id}', [VendorProductImageGalleryController::class, 'showTable'])->name('product-image-gallery.showtable');
Route::resource('product-image-gallery', VendorProductImageGalleryController::class);

// Product Variant Route
Route::get('product-variant/{id}', [VendorProductVariantController::class, 'showTable'])->name('product-variant.showtable');
Route::get('product-variant/create/{id}', [VendorProductVariantController::class, 'createVariant'])->name('product-variant.create-varian');
Route::put('product-variant/change-status', [VendorProductVariantController::class, 'changestatus'])->name('product-variant.changestatus');
Route::resource('product-variant', VendorProductVariantController::class);

// Product Variant items Route
Route::get('product-variant-item/{productid}/{variantId}',[VendorProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productid}/{variantId}',[VendorProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item/store',[VendorProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}',[VendorProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}', [VendorProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item-destroy/{variantItemId}', [VendorProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item/change-status', [VendorProductVariantItemController::class, 'changestatus'])->name('product-variant-item.changestatus');
