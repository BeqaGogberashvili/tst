<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('/', [QuotesController::class, 'index'])->name('index');

Route::get('movies/create', [MoviesController::class, 'create'])->middleware('auth')->name('movies.create');
Route::post('movies', [MoviesController::class, 'store'])->name('movies');

Route::get('quotes/create', [QuotesController::class, 'create'])->middleware('auth')->name('quotes.create');
Route::post('quotes', [QuotesController::class, 'store'])->name('quotes');

Route::get('movies/{movie:slug}', [QuotesController::class, 'show'])->name('movies.show');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('destroy');
