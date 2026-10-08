<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Halaman awal: navigasi sederhana ke modul Kategori dan Buku
Route::view('/', 'home')->name('home');

// CRUD Kategori dan Buku (tanpa method show)
Route::resource('categories', CategoryController::class)->except('show');
Route::resource('books', BookController::class)->except('show');