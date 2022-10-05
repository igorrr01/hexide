<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Database\Seeders\DatabaseSeeder;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/language/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/admin/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users/index', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::patch('/admin/users/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/users/destroy', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/admin/products/index', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/admin/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::patch('/admin/products/update', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/products/destroy', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.destroy');

    Route::get('/admin/orders/index', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/admin/orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.order.show');
    Route::delete('/admin/orders/destroy', [App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('admin.order.destroy');


    Route::get('/seed/users', [DatabaseSeeder::class, 'user'])->name('seed.user');
    Route::get('/seed/products', [DatabaseSeeder::class, 'product'])->name('seed.product');
    Route::get('/seed/orders', [DatabaseSeeder::class, 'order'])->name('seed.order');
});
