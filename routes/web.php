<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
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

    Route::get('/tag', [TagController::class, "index"])->name('admin.tag.index');
    Route::post('/tag/store', [TagController::class, "store"])->name('admin.tag.store');
    Route::get('/tag/trash', [TagController::class, "trash"])->name('admin.tag.trash');
    Route::patch('/tag/edit/{tag}', [TagController::class, "edit"])->name('admin.tag.edit');
    Route::delete('/tag/delete/{tag}', [TagController::class, "delete"])->name('admin.tag.delete');
    Route::patch('/tag/recover/{tag}', [TagController::class, "recover"])->name('admin.tag.recover');

    Route::get('/posts/create', [PostController::class, "create"])->name('admin.post.create');
    Route::post('/posts/create', [PostController::class, "store"])->name('admin.post.store');
});
