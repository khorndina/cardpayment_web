<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminVendorProfileController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ChildCategoryController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\FlashSaleController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductImageGalleryController;
use App\Http\Controllers\backend\ProductVariantItemController;
use App\Http\Controllers\backend\ProductVariantontroller;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SellerProductController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\ShippingRuleController;
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
Route::put('products/change-status', [ProductController::class, 'changestatus'])->name('products.changestatus');
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
Route::get('product-variant-item/{productid}/{variantId}',[ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productid}/{variantId}',[ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item/store',[ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}',[ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item-destroy/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item/change-status', [ProductVariantItemController::class, 'changestatus'])->name('product-variant-item.changestatus');

// Seller Product route
Route::get('seller-products', [SellerProductController::class, 'index'])->name('seller-products.index');
Route::get('seller-pending-products', [SellerProductController::class, 'pendingProduct'])->name('seller-pending-products.pendingProduct');
Route::put('approve-pending-product', [SellerProductController::class, 'isApprove'])->name('approve-pending-product');

// Flash Slae route
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/change-status', [FlashSaleController::class, 'changestatus'])->name('flash-sale.changestatus');
Route::put('flash-sale/show-at-home', [FlashSaleController::class, 'showAtHome'])->name('flash-sale.show-at-home');
Route::delete('flash-sale-item-destroy/{flashSaleItem}', [FlashSaleController::class, 'destroy'])->name('flash-sale-item.destroy');

// General setting route
Route::get('general-setting', [SettingController::class, 'index'])->name('general-setting.index');
Route::put('general-setting-update', [SettingController::class, 'updateGeneralSetting'])->name('general-setting-update.updateGeneralSetting');


// Coupon route
Route::put('coupons/change-status', [CouponController::class, 'changestatus'])->name('coupons.changestatus');
Route::resource('coupons', CouponController::class);

// Shipping Rule route
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changestatus'])->name('shipping-rule.changestatus');
Route::resource('shipping-rule', ShippingRuleController::class);
