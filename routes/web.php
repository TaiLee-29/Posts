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
//Categories
Route::get('/category/create','\App\Http\Controllers\CategoryController@createC');
Route::post('/category/create','\App\Http\Controllers\CategoryController@storeC');
Route::get('/category/{id}/update','\App\Http\Controllers\CategoryController@updateC');
Route::post('/category/{id}/update','\App\Http\Controllers\CategoryController@editC');
Route::post('/category/{id}/delete','\App\Http\Controllers\CategoryController@destroyC');
Route::get('/category/list','\App\Http\Controllers\CategoryController@listC');

//Tags
Route::get('/tag/list','\App\Http\Controllers\TagController@listT');
Route::get('/tag/create','\App\Http\Controllers\TagController@createT');
Route::post('/tag/create','\App\Http\Controllers\TagController@storeT');
Route::get('/tag/{id}/update','\App\Http\Controllers\TagController@updateT');
Route::post('/tag/{id}/update','\App\Http\Controllers\TagController@editT');
Route::post('/tag/{id}/delete','\App\Http\Controllers\TagController@destroyT');

//Posts
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::get('/author/{id}', \App\Http\Controllers\PostByAuthorController::class)->name('post-by-author');
Route::get('/category/{id}', \App\Http\Controllers\PostByCategoryController::class)->name('post-by-category');
Route::get('/tag/{tag}', \App\Http\Controllers\PostByTagController::class)->name('post-by-tag');
Route::get('/author/{authorid}/category/{categoryid}', \App\Http\Controllers\PostByAuthorAndCategoryController::class)->name('post-by-author-and-category');
Route::get('/author/{authorid}/category/{categoryid}/tag/{tagid}', \App\Http\Controllers\PostByAuthorAndCategoryAndTagController::class)->name('post-by-author-and-category-and-tag');
Route::get('/post/list','\App\Http\Controllers\PostController@listP');
Route::get('/post/create','\App\Http\Controllers\PostController@createP');
Route::post('/post/create','\App\Http\Controllers\PostController@storeP');
Route::get('/post/{id}/update','\App\Http\Controllers\PostController@updateP');
Route::post('/post/{id}/update','\App\Http\Controllers\PostController@editP');
Route::post('/post/{id}/delete','\App\Http\Controllers\PostController@destroyP');



Route::middleware('guest')->group(function (){
    Route::get('/auth/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('auth-login');
    Route::post('/auth/login',[\App\Http\Controllers\AuthController::class, 'handleLogin'])->name('auth-handle-login');


});

Route::middleware('auth')->group(function(){
    Route::get('/auth/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('auth-logout');

});


