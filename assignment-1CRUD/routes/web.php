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
Route::get('movies',[MovieController::class,'showAllMovie']);
Route::get('movies/create',[MovieController::class,'create']);
Route::post('moives/upload',[MovieController::class,'movieStore']);
Route::get('movies/{id}',[MovieController::class,'movieShow']);
Route::get('movies/{id}/edit',[MovieController::class,'movieEdit']);
Route::put('movies/{id}',[MovieController::class,'movieUpdate']);
Route::delete('movies/{id}',[MovieController::class,'movieDelete']);

Route::get('genres',[GenreController::class,'showAll']);
Route::get('genres/create',[GenreController::class,'create']);
Route::post('genres/upload',[GenreController::class,'storeGenre']);
Route::get('genres/{id}/edit',[GenreController::class,'editGenre']);
Route::put('genres/{id}',[GenreController::class,'updateGenre']);
Route::delete('genres/{id}',[GenreController::class,'deleteGenre']);

Route::get('/file-import',[MovieController::class,'importView'])->name('import-view');
Route::post('/import',[MovieController::class,'import'])->name('import');
Route::get('/export-movies',[MovieController::class,'exportUsers'])->name('export-movies');

Route::get('/', function () {
    return view('welcome');
});
