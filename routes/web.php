<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('index',[ProductController::class, 'index']);
Route::get('add',[ProductController::class, 'add']);
Route::post('save',[ProductController::class, 'save']);
Route::get('edit/{id}',[ProductController::class, 'edit']);
Route::post('update',[ProductController::class, 'update']);
Route::get('delete/{id}',[ProductController::class, 'delete']);
*/

Route::get('customers/index',[ProductController::class, 'index']);
Route::get('customers/products', [ProductController::class, 'products']);
Route::get('customers/register', [CustomerController::class, 'register']);
Route::post('customers/registerProcess', [CustomerController::class, 'registerProcess'])->name('registerProcess');
Route::get('customers/login', [CustomerController::class, 'login']);
Route::post('customers/loginProcess', [CustomerController::class, 'loginProcess']);
Route::get('customers/logout', [CustomerController::class, 'logout']);

Route::get('admin/index', [AdminController::class, 'index']);
Route::get('admin/login', [AdminController::class, 'login'])->name('login');
Route::post('admin/checkLogin', [AdminController::class, 'checkLogin'])->name('checkLogin');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('admin/products', [ProductController::class, 'productsAdmin'])->name('products');
Route::get('admin/add', [AdminController::class, 'add'])->name('add');
Route::post('admin/save', [AdminController::class, 'save'])->name('save');
Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('admin/update', [AdminController::class, 'update'])->name('update');
Route::get('admin/delete/{id}',[AdminController::class, 'delete'])->name('delete');