<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

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
Route::get('movies',[MovieController::class,'index'])->name('movies.index');
Route::get('movies/create',[MovieController::class,'create'])->name('movies.create');
Route::post('moives/upload',[MovieController::class,'store'])->name('movies.store');

Route::get('movies/{id}',[MovieController::class,'show'])->name('movies.show');
Route::get('movies/{id}/edit',[MovieController::class,'edit'])->name('movies.edit');
Route::put('movies/{id}',[MovieController::class,'update'])->name('movies.update');
Route::delete('movies/{id}',[MovieController::class,'destroy'])->name('movies.destroy');

Route::get('genres',[GenreController::class,'index'])->name('genres.index');
Route::get('genres/create',[GenreController::class,'create'])->name('genres.create');
Route::post('genres/upload',[GenreController::class,'store'])->name('genres.store');
Route::get('genres/{id}/edit',[GenreController::class,'edit'])->name('genres.edit');
Route::put('genres/{id}',[GenreController::class,'update'])->name('genres.update');
Route::delete('genres/{id}',[GenreController::class,'delete'])->name('genres.destroy');

Route::get('/file-import',[MovieController::class,'importView'])->name('import-view');
Route::post('/import',[MovieController::class,'import'])->name('import');
Route::get('/export-movies',[MovieController::class,'exportUsers'])->name('export-movies');

Route::get('/', function () {
    return view('welcome');
});
