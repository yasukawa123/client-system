<?php

use Illuminate\Support\Facades\Route;

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

// Viewsテスト用
// Route::get('/test', function () {
//     return view('hello');
// });
// Route::get('page_a', function () {
//     return view('page_a');
// });
// Route::get('page_b', function () {
//     return view('page_b');
// });

Route::get('/', [\App\Http\Controllers\TopPageController::class, 'top_page'])->name('top_page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 社員一覧呼び出し
Route::get('/users', \App\Http\Controllers\UserController::class)->name('社員一覧')->middleware('auth');
// 役職一覧呼び出し
Route::get('/roles', \App\Http\Controllers\RoleController::class)->name('ロール一覧')->middleware('auth');
// 顧客管理一覧
Route::resource('/customers', \App\Http\Controllers\CustomerController::class)->middleware('auth');