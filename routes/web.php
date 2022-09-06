<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\LanguageController;

Route::get('/', [QuotesController::class, 'index'])->name('index');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('destroy');

Route::get('movies/create', [MoviesController::class, 'create'])->middleware('auth')->name('movies.create');
Route::post('movies/create', [MoviesController::class, 'store'])->name('movies');

Route::get('movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('movie/list', [MoviesController::class, 'index'])->middleware('auth')->name('movie.list');
Route::get('quote/list', [QuotesController::class, 'index'])->middleware('auth')->name('quote.list');

Route::get('quotes/create', [QuotesController::class, 'create'])->middleware('auth')->name('quotes.create');
Route::post('quotes', [QuotesController::class, 'store'])->name('quotes');

Route::get('quotes/{quote}/edit', [QuotesController::class, 'edit'])->middleware('auth')->name('quote.edit');
Route::patch('quotes/{quote}', [QuotesController::class, 'update'])->middleware('auth')->name('quote.update');
Route::delete('quotes/{quote}', [QuotesController::class, 'destroy'])->middleware('auth')->name('quote.delete');

Route::get('movies/{movie}/edit', [MoviesController::class, 'edit'])->middleware('auth')->name('movie.edit');
Route::patch('movies/{movie}', [MoviesController::class, 'update'])->middleware('auth')->name('movie.update');
Route::delete('movies/{movie}', [MoviesController::class, 'destroy'])->middleware('auth')->name('movie.delete');

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');
