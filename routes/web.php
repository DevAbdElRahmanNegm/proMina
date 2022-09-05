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
    return view('index');
});

Route::resource('album',\App\Http\Controllers\AlbumController::class)->except('show');
Route::resource('image',\App\Http\Controllers\ImageController::class)->except(['show','index']);
Route::get('image/{id}',[\App\Http\Controllers\ImageController::class,'index'])->name('image.index');
Route::get('move/{id}',[\App\Http\Controllers\AlbumController::class,'move'])->name('image.move');

Route::post('album/delete/all/{id}',[\App\Http\Controllers\AlbumController::class,'deleteAll'])->name('delete.All');
Route::post('album/moveto',[\App\Http\Controllers\AlbumController::class,'moveTo'])->name('move.to');
