<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'home'])->name('home');

Route::middleware(['guest'])->group(function(){
    Route::get('/register',[AuthController::class,'registerPage'])->name('register');
    Route::get('/login',[AuthController::class,'loginPage'])->name('login');
    Route::post('/register',[AuthController::class,'register'])->name('register.actions');
    Route::post('/login',[AuthController::class,'login'])->name('login.actions');   
});

Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/home',[AdminController::class,'home'])->name('admin.home');

    Route::get('/admin/users/all',[AdminController::class,'allUsers'])->name('users.all');
    Route::get('/admin/users/active',[AdminController::class,'activeUsers'])->name('users.active');
    Route::get('/admin/users/deleted',[AdminController::class,'deletedUsers'])->name('users.deleted');
    Route::post('/admin/users/{user}/delete',[AdminController::class,'deleteUser'])->middleware('can:delete,user')->name('user.delete');
    Route::post('/admin/users/{id}/restore',[AdminController::class,'restoreUser'])->name('user.restore');
    Route::post('/admin/users/{id}/forceDelete',[AdminController::class,'forceDeleteUser'])->name('user.forceDelete');
    Route::post('/admin/users/{user}/toggle',[AdminController::class,'toggleUser'])->middleware('can:toggleAdmin,user')->name('user.toggle');

    Route::get('/admin/products',[ProductController::class,'products'])->name('products');
    Route::post('/admin/products',[ProductController::class,'addProduct'])->name('product.add');
    Route::post('/admin/products/{product}/delete',[ProductController::class,'deleteProduct'])->name('product.delete');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/admin/products/{product}/edit', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::get('/admin/products/{product}/images', [ProductController::class, 'productImages'])->name('product.images');
    Route::post('/admin/products/{product}/images',[ProductController::class,'addImage'])->name('product.images.add');
    Route::post('/admin/products/images/{image}/delete', [ProductController::class, 'deleteImage'])->name('product.image.delete');
    });



