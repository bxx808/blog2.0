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
    Route::get('/categories/trash', [CategoryController::class, "trash"])->name('admin.category.trash');
    Route::post('/categories/store', [CategoryController::class, "store"])->name('admin.category.store');
    Route::patch('/categories/edit/{category}', [CategoryController::class, "edit"])->name('admin.category.edit');
    Route::delete('/categories/delete/{category}', [CategoryController::class, "delete"])->name('admin.category.delete');
    Route::patch('/categories/recover/{category}', [CategoryController::class, "recover"])->name('admin.category.recover');
    Route::delete('/categories/destroy/{category}', [CategoryController::class, "destroy"])->name('admin.category.destroy');
});
