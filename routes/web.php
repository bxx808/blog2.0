<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [PageController::class, "index"])->name('admin.index');
    Route::get('/categories', [CategoryController::class, "index"])->name('admin.category.index');
    Route::post('/categories/store', [CategoryController::class, "store"])->name('admin.category.store');
});
