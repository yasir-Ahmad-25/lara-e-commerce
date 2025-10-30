<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Front Section
Route::get('/', [UserController::class, 'home'])->name('index');
Route::get('view_all_products', [UserController::class, 'view_all_products'])->name('view_all_products');
Route::get('product_details/{id}', [UserController::class, 'product_details'])->name('product_details');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin Section
Route::middleware('admin_middleware')->group(function(){
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware('admin_middleware')->controller(AdminController::class)->group(function(){

    ########## CATEGORIES SECTION ###########
    Route::get('add_category','add_category')->name('admin.categories.add_category');
    Route::post('add_category','post_category')->name('admin.post_category');

    // View Category
    Route::get('view_categories','view_categories')->name('admin.categories.view_categories');

    // Edit Category
    Route::get('edit_category/{id}','edit_category')->name('admin.categories.edit_category');
    Route::post('update_category/{id}','update_category')->name('admin.update_category');

    // Delete Category
    Route::get('delete_category/{id}','delete_category')->name('admin.delete_category');


    ############ PRODUCTS SECTION ##########
    Route::get('add_product','add_product')->name('admin.products.add_product');
    Route::post('create_product','create_product')->name('admin.create_product');
    
    // Edit Products
    Route::get('edit_product/{id}','edit_product')->name('admin.products.edit_product');
    Route::post('update_product/{id}','update_product')->name('admin.update_product');

    // Delete Product
    Route::get('delete_product/{id}','delete_product')->name('admin.delete_product');
    // View Products
    Route::get('view_products','view_products')->name('admin.products.view_products');
});

require __DIR__.'/auth.php';
