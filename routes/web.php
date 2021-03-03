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

Route::get('/', \App\Http\Controllers\HomeController::class);
Route::get('/author/{id}', \App\Http\Controllers\PostByAuthorController::class)->name('post-by-author');
Route::get('/category/{id}', \App\Http\Controllers\PostByCategoryController::class)->name('post-by-category');
Route::get('/tag/{id}', \App\Http\Controllers\PostByCategoryController::class)->name('post-by-category');
