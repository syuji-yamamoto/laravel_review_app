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

Auth::routes();
Route::get('/', [App\Http\Controllers\BooksController::class, 'index']);
Route::group(['middleware' => ['auth']], function(){
  Route::resource('book' , 'App\Http\Controllers\BooksController' ,['excpet' => ['index', 'show']] ); 
});
Route::resource('book', 'App\Http\Controllers\BooksController', ['only' => ['index', 'show']]);

// Route::get('/index', [App\Http\Controllers\BooksController::class, 'index'])->name('book.index');
// Route::get('/create', [App\Http\Controllers\BooksController::class, 'create'])->name('book.create');
// Route::post('/store', [App\Http\Controllers\BooksController::class, 'store'])->name('book.store');
// Route::get('/show/{id}', [App\Http\Controllers\BooksController::class, 'show'])->name('book.show');