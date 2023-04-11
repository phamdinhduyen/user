<?php

use App\Models\User;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrmController;

Route::prefix('')->name('user.')->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/add", [UserController::class, 'add'])->name('add');
    Route::post("/add", [UserController::class, 'postAdd'])->name('postadd');
    Route::get("/edit{id}", [UserController::class, 'getEdit'])->name('edit');
    Route::post("/edit{id}", [UserController::class, 'postedit'])->name('postedit');
    Route::get("/delete{id}", [UserController::class, 'delete'])->name('delete');
     Route::get("/relations", [UserController::class, 'relations'])->name('relations');
});

Route::prefix('groups')->name('groups.')->group(function () {
    Route::get("/", [GroupController::class, 'index'])->name('index');
    Route::post("/", [GroupController::class, 'add'])->name('add');
  
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get("/", [PostController::class, 'index'])->name('index');
    Route::get("/add", [PostController::class, 'add'])->name('add');
    Route::post("/add", [PostController::class, 'postAdd'])->name('postAdd');
    Route::get("/delete/{id}", [PostController::class, 'update'])->name('update');
    Route::get("/delete/{id}", [PostController::class, 'delete'])->name('delete');
    Route::post("/delete-any", [PostController::class, 'handleDeleteAny'])->name('delete-any');
    Route::get("/restore/{id}", [PostController::class, 'restore'])->name('restore');
});

Route::prefix('orm')->name('orm.')->group(function () {
    Route::get("/", [OrmController::class, 'index'])->name('index');
    Route::get("/post", [OrmController::class, 'posts'])->name('posts');

});