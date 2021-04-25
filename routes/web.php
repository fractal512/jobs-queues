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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/post', [\App\Http\Controllers\Blog\PostController::class, 'store'])->name('post');
Route::group(['prefix' => 'post'], function () {
    Route::get('/create', [\App\Http\Controllers\Blog\PostController::class, 'store']);
    Route::get('/delete/{id}', [\App\Http\Controllers\Blog\PostController::class, 'destroy']);
});
