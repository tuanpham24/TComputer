<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Client\ProductController;
use App\Http\Controllers\Web\Admin\AdminProductController;
use App\Http\Controllers\Web\Client\CartController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Client
Route::get('/', [ProductController::class, 'index']) ->name('home');
Route::get('product/detail/{id}', [ProductController::class, 'detail']);
Route::get('product/list-category/{category}', [ProductController::class, 'getListForCategory']);
Route::get('product/cart', [CartController::class, 'index']) -> name('products.cart');
Route::get('product/cart/add/{id}', [CartController::class, 'add']);
Route::post('product/cart/update', [CartController::class, 'update']) -> name('cart.update');
Route::get('product/cart/remove/{rowId}', [CartController::class, 'remove']);

Route::get("product/pay", [ProductController::class, 'pay']) -> name('pay');


// Admin
Route::get('admin/', [AdminProductController::class, 'index']);
Route::get('admin/product/show', [AdminProductController::class, 'show']) -> name('admin.product.show');
Route::get('admin/product/add', [AdminProductController::class, 'add']);
Route::post('admin/product/store', [AdminProductController::class, 'store']) -> name('admin.product.store');
Route::get('admin/product/list-product', [AdminProductController::class, 'getProducts']) ->name('admin.product.list');

Route::get('admin/product/getupdate/{id}', [AdminProductController::class, 'showFormUpdate']) -> name('admin.product.showFormUpdate');
Route::post('admin/product/update/{id}', [AdminProductController::class, 'update']) -> name('admin.product.update');
Route::get('admin/product/delete/{id}', [AdminProductController::class, 'delete']) -> name('admin.product.delete');

// Auth
// Register
Route::get('user/register', [AuthController::class, 'showFormRegister']) -> name('user.show-form-regis');
Route::post('user/register', [AuthController::class, 'register']) -> name('user.register');

// Login
Route::get('user/login', [AuthController::class, 'showFormLogin']) -> name('user.show-form-login');
Route::post('user/login', [AuthController::class, 'login']) -> name('user.login');

// Log out
Route::get('user/logout', [AuthController::class, 'logout']) -> name('user.logout');

// 
Route::get('user/profile', [AuthController::class, 'showProfile']) -> name('user.show-profile');
Route::post('user/profile', [AuthController::class, 'updateProfile']) -> name('user.update-profile');