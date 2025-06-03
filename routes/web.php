<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


// Customer pages
Route::get('/', [CustomerController::class, 'home'])->name('home');
Route::get('/mobile-phones', [CustomerController::class, 'mobile'])->name('mobiles');
Route::get('/personal-computers', [CustomerController::class, 'pc'])->name('pcs');
Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);
Route::resource('/mobiles', ProductController::class);
Route::get('/product', [ProductController::class, 'index'])->name('product.index2');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/mobiles', [ProductController::class, 'showMobiles'])->name('mobiles');
Route::get('/pcs', [ProductController::class, 'showPcs'])->name('pcs');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products-show');
Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// // Redirect root to login page
// Route::get('/', function () {
//     return redirect()->route('login');
// });

// // Protect all routes with auth middleware
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {

//     // Customer pages
//     Route::get('/home', [CustomerController::class, 'home'])->name('home');
//     Route::get('/mobile-phones', [CustomerController::class, 'mobile'])->name('mobiles');
//     Route::get('/personal-computers', [CustomerController::class, 'pc'])->name('pcs');

//     // Product and Category management
//     Route::resource('/category', CategoryController::class);
//     Route::resource('/product', ProductController::class);

//     // Duplicate custom routes (ensure these don’t conflict with resource routes)
//     Route::get('/product', [ProductController::class, 'index'])->name('product.index2');
//     Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
//     Route::get('/mobiles', [ProductController::class, 'showMobiles'])->name('mobiles');
//     Route::get('/pcs', [ProductController::class, 'showPcs'])->name('pcs');

//     // Product details and edit
//     Route::get('/products/{id}', [ProductController::class, 'show'])->name('products-show');
//     Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
//     Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');

//     // Admin page
//     Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');


// });