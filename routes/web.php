<?php

use App\Http\Controllers\MoviesController;
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
require __DIR__ . '/auth.php';

Route::get('/', [MoviesController::class, 'home'])->name('home');
Route::get('/movieDetails/{id?}', [MoviesController::class, 'movieDetails'])->name('movieDetails');
Route::post('/store/{id?}/{title?}/{poster_path?}', [MoviesController::class, 'saveMovie'])->name('store')->middleware('auth');
Route::delete('/delete/{id?}', [MoviesController::class, 'removeMovie'])->name('delete')->middleware('auth');
Route::get('/profile', [MoviesController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/description', [MoviesController::class, 'description'])->name('description')->middleware('auth');
Route::get('/search', [MoviesController::class, 'searchMovie'])->name('search');
