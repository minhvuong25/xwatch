<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Client\HomeController;

Route::get('/category/{slug}.html', [HomeController::class, 'category'])->name('category');
// http://x-watch2.test/category/dong-ho-nu.html
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/thuong-hieu.html', [HomeController::class, 'brands']);
Route::post('/post-brands', [HomeController::class, 'getBrands'])->name('getBrands');
Route::post('/', [HomeController::class, 'index'])->name('submitFilter');