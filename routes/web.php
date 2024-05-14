<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// Route::get('/login', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add_category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add_category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit_category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update_category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete_category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('posts', [App\Http\Controllers\Admin\Postcontroller::class, 'index']);
    Route::get('add_posts', [App\Http\Controllers\Admin\Postcontroller::class, 'create']);
    Route::post('add_posts', [App\Http\Controllers\Admin\Postcontroller::class, 'store']);
    Route::get('edit_posts/{post_id}', [App\Http\Controllers\Admin\Postcontroller::class, 'edit']);
    Route::put('update_posts/{post_id}', [App\Http\Controllers\Admin\Postcontroller::class, 'update']);
    Route::get('delete_posts/{post_id}', [App\Http\Controllers\Admin\Postcontroller::class, 'destroy']);


    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('edit_users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update_user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
});