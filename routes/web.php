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

Route::get('customers/index',[CustomerController::class, 'index']);
Route::get('customers/products', [ProductController::class, 'products']);
Route::get('customers/productDetail/{id}',[ProductController::class,'productDetail']);
Route::get('customers/category/{id}',[ProductController::class,'category']);
Route::get('customers/category1/{id}',[ProductController::class,'category1']);

Route::get('customers/profile/{email}',[CustomerController::class, 'editProfile']);
Route::post('customers/updateProfile/{email}', [CustomerController::class, 'updateProfile']);
Route::get('customers/shoppingcart',[ProductController::class,'shoppingcart']);

Route::get('customers/register', [CustomerController::class, 'register']);
Route::post('customers/registerProcess', [CustomerController::class, 'registerProcess'])->name('registerProcess');
Route::get('customers/login', [CustomerController::class, 'login']);
Route::post('customers/loginProcess', [CustomerController::class, 'loginProcess'])->name('loginProcess');
Route::get('customers/logout', [CustomerController::class, 'logout']);

Route::get('admin/index', [AdminController::class, 'index']);
Route::get('admin/login', [AdminController::class, 'login'])->name('login');
Route::post('admin/checkLogin', [AdminController::class, 'checkLogin'])->name('checkLogin');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('admin/products', [ProductController::class, 'productsAdmin'])->name('products');
Route::get('admin/admins', [AdminController::class, 'admins'])->name('admins');
Route::get('admin/customers', [AdminController::class, 'customers'])->name('customers');
Route::get('admin/categories', [AdminController::class, 'categories'])->name('categories');

Route::get('admin/add', [AdminController::class, 'add'])->name('add');
Route::post('admin/save', [AdminController::class, 'save'])->name('save');
Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('admin/update', [AdminController::class, 'update'])->name('update');
Route::get('admin/delete/{id}',[AdminController::class, 'delete'])->name('delete');

Route::get('admin/addAdmin', [AdminController::class, 'addAdmin'])->name('addAdmin');
Route::post('admin/saveAdmin', [AdminController::class, 'saveAdmin'])->name('saveAdmin');
Route::get('admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
Route::post('admin/updateAdmin', [AdminController::class, 'updateAdmin'])->name('updateAdmin');
Route::get('admin/deleteAdmin/{id}',[AdminController::class, 'deleteAdmin'])->name('deleteAdmin');

Route::get('admin/addCustomer', [AdminController::class, 'addCustomer'])->name('addCustomer');
Route::post('admin/saveCustomer', [AdminController::class, 'saveCustomer'])->name('saveCustomer');
Route::get('admin/editCustomer/{id}', [AdminController::class, 'editCustomer'])->name('editCustomer');
Route::post('admin/updateCustomer', [AdminController::class, 'updateCustomer'])->name('updateCustomer');
Route::get('admin/deleteCustomer/{id}',[AdminController::class, 'deleteCustomer'])->name('deleteCustomer');

Route::get('admin/addCategory', [AdminController::class, 'addCategory'])->name('addCategory');
Route::post('admin/saveCategory', [AdminController::class, 'saveCategory'])->name('saveCategory');
Route::get('admin/editCategory/{id}', [AdminController::class, 'editCategory'])->name('editCategory');
Route::post('admin/updateCategory', [AdminController::class, 'updateCategory'])->name('updateCategory');
Route::get('admin/deleteCategory/{id}',[AdminController::class, 'deleteCategory'])->name('deleteCategory');