<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

//Route for mailing
