<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('admin.home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('admin.products.delete');
Route::patch('/products/{product}', [ProductController::class, 'restore'])->name('admin.products.restore');

Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'delete'])->name('admin.orders.delete');

Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/users/{user}', [UserController::class, 'delete'])->name('admin.users.delete');
