<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

Route::get('/test', function () {
    return view('test', ['message' => 'Hello Laravel']);
});

Route::get('/admin', [DashboardController::class, 'index']);

Route::get('/admin/category/create', [CategoryController::class, 'create']);

Route::post('/admin/category', [CategoryController::class, 'store']);
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/category/{id}', [CategoryController::class, 'show']);
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/admin/category/{id}', [CategoryController::class, 'update']);
Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy']);

Route::resource('admin/product', ProductController::class);

Route::get('/admin/trx/create', [TransactionController::class, 'create']);
Route::post('/admin/trx/import', [TransactionController::class, 'import']);
Route::get('/admin/trx', [TransactionController::class, 'index']);



