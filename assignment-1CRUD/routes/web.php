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
Route::get('movies',[MovieController::class,'index']);
Route::get('movies/create',[MovieController::class,'create']);
Route::post('moives/upload',[MovieController::class,'store']);
Route::get('movies/{id}',[MovieController::class,'show']);
Route::get('movies/{id}/edit',[MovieController::class,'edit']);
Route::put('movies/{id}',[MovieController::class,'update']);
Route::delete('movies/{id}',[MovieController::class,'delete']);

Route::get('genres',[GenreController::class,'index']);
Route::get('genres/create',[GenreController::class,'create']);
Route::post('genres/upload',[GenreController::class,'store']);
Route::get('genres/{id}/edit',[GenreController::class,'edit']);
Route::put('genres/{id}',[GenreController::class,'update']);
Route::delete('genres/{id}',[GenreController::class,'delete']);

Route::get('/', function () {
    return view('welcome');
});
