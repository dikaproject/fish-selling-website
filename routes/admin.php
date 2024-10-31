<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\ArticleCategoryController;
use App\Http\Controllers\Web\Admin\ArticleController;
use App\Http\Controllers\Web\Admin\ArticleTagController;
use App\Http\Controllers\Web\Admin\RoleController;
use App\Http\Controllers\Web\Admin\PermissionController;
use App\Http\Controllers\Web\Admin\WriterController;
use App\Http\Controllers\Web\Admin\ProductCategoryController;
use App\Http\Controllers\Web\Admin\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [App\Http\Controllers\Web\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::resource('example', App\Http\Controllers\Web\Admin\ExampleController::class);

Route::resource('writer', WriterController::class);
Route::resource('role', RoleController::class);
Route::resource('permission', PermissionController::class);

Route::resource('article-category', ArticleCategoryController::class);
Route::resource('article-tag', ArticleTagController::class);
Route::resource('article', ArticleController::class);

Route::resource('product-category', App\Http\Controllers\Web\Admin\ProductCategoryController::class);
Route::resource('product', App\Http\Controllers\Web\Admin\ProductController::class);
