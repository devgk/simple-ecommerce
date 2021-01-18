<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Shop\CheckOutController;
use App\Http\Controllers\Shop\UserOrderController;
use App\Http\Controllers\Shop\AdminOrderController;
use App\Http\Controllers\UserManagement\UserAccount;
use App\Http\Controllers\Shop\AdminProductController;
use App\Http\Controllers\UserManagement\AdminAddUser;
use App\Http\Controllers\Shop\CheckOutConfirmController;
use App\Http\Controllers\Shop\AdminManageOrderController;
use App\Http\Controllers\UserManagement\AdminRoleManagement;
use App\Http\Controllers\UserManagement\AdminUserManagement;


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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function(){
  Route::get('/register', [RegisterController::class, 'index'])->name('register');
  Route::post('/register', [RegisterController::class, 'store']);

  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'store']);
});

Route::group(['middleware' => ['auth']], function(){
  Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');

  Route::get('/checkout/completed', [CheckOutConfirmController::class, 'index'])->name('checkout.completed');
  Route::get('/checkout/{product:id}', [CheckOutController::class, 'index'])->name('checkout');

  Route::get('/orders', [UserOrderController::class, 'index'])->name('orders');
  Route::post('/order/{product:id}/add', [UserOrderController::class, 'store'])->name('order.add');

  Route::get('/account', [UserAccount::class, 'index'])->name('account');
  Route::post('/account', [UserAccount::class, 'store']);

  Route::group(['middleware' => ['manager']], function(){
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/admin/order/{order:order_id}', [AdminManageOrderController::class, 'index'])->name('admin.manageOrder');
    Route::post('/admin/order/{order:order_id}', [AdminManageOrderController::class, 'store']);

    Route::get('/admin/product/add', [AdminProductController::class, 'index'])->name('admin.product.add');
    Route::post('/admin/product/add', [AdminProductController::class, 'store']);
  });

  Route::group(['middleware' => ['admin']], function(){
    Route::get('/admin/manage/user/{user:username}', [AdminRoleManagement::class, 'index'])->name('admin.userRole');
    Route::post('/admin/manage/user/{user:username}', [AdminRoleManagement::class, 'store']);
    
    Route::get('/admin/users', [AdminUserManagement::class, 'index'])->name('admin.allUsers');
    Route::get('/admin/users/add', [AdminAddUser::class, 'index'])->name('admin.addUsers');
    Route::post('/admin/users/add', [AdminAddUser::class, 'store']);
  });
});