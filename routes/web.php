<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/',[PageController::class, 'index'])->name('homepage');

Route::prefix('api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('articles', ArticleController::class);
});


// User Routes
Route::get('/user/{user}/edit', [PageController::class, 'editUser'])->name('page.editUser');
Route::put('/user/{user}', [PageController::class, 'updateUser'])->name('page.updateUser');
Route::delete('/user/{user}', [PageController::class, 'destroyUser'])->name('page.destroyUser');

//Livewire Routers
Route::get('/users', [PageController::class, 'userIndex'])->name('users.index');
Route::get('/articles', [PageController::class, 'articleIndex'])->name('articles.index');
Route::get('/categories', [PageController::class, 'categoryIndex'])->name('categories.index');


// Category Routes
Route::get('/category/{category}/edit', [PageController::class, 'editCategory'])->name('page.editCategory');
Route::put('/category/{category}', [PageController::class, 'updateCategory'])->name('page.updateCategory');
Route::delete('/category/{category}', [PageController::class, 'destroyCategory'])->name('page.destroyCategory');

// Article Routes
Route::get('/article/{article}/edit', [PageController::class, 'editArticle'])->name('page.editArticle');
Route::put('/article/{article}', [PageController::class, 'updateArticle'])->name('page.updateArticle');
Route::delete('/article/{article}', [PageController::class, 'destroyArticle'])->name('page.destroyArticle');
