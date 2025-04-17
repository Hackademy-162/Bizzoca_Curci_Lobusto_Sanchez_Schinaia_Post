<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'homepage' ])->name('homepage');
Route::get('/register', [ArticleController::class, 'register'])->name('register');
Route::get('/login', [ArticleController::class, 'login'])->name('login');
