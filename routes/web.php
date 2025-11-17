<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController as UserPageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserPageController::class, 'index'])->name('home');
Route::get('/post/{id}', [UserPageController::class, 'post'])->name('post');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');

Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
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
    Route::get('/posts', [PostController::class, "index"])->name('admin.post.index');
    Route::get('/posts/edit/{post}', [PostController::class, "edit"])->name('admin.post.edit');
    Route::patch('/posts/edit/{post}', [PostController::class, "update"])->name('admin.post.update');
    Route::delete('/posts/delete/{post}', [PostController::class, "delete"])->name('admin.post.delete');

    Route::post('/ckeditor/upload', [CkeditorController::class, "upload"])->name('ckeditor.upload');

    Route::get('/users', [UserController::class, "index"])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, "create"])->name('admin.user.create');
    Route::post('/user/create', [UserController::class, "store"])->name('admin.user.store');
    Route::get('/user/{user}/edit', [UserController::class, "edit"])->name('admin.user.edit');
    Route::post('/user/{user}/edit', [UserController::class, "update"])->name('admin.user.update');
    Route::delete('/user/{user}/delete', [UserController::class, "delete"])->name('admin.user.delete');

});
