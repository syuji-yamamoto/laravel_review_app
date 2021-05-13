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
    return view('book.index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('book', 'App\Http\Controllers\BooksController', array('only' => array('index', 'create', 'store')));
// Route::get('/index', [App\Http\Controllers\BooksController::class, 'index'])->name('book.index');
// Route::get('/create', [App\Http\Controllers\BooksController::class, 'create'])->name('book.create');
// Route::post('/store', [App\Http\Controllers\BooksController::class, 'store'])->name('book.store');