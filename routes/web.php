<?php

use App\Models\User;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrmController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
})->middleware('verified');

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('')->name('user.')->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/add", [UserController::class, 'add'])->name('add')->middleware(['auth', 'verified']);
    Route::post("/add", [UserController::class, 'postAdd'])->name('postadd');
    Route::get("/create", [RegisterController::class, 'get'])->name('get');
    Route::post("/create", [RegisterController::class, 'create'])->name('create');
    
    Route::get("/edit{id}", [UserController::class, 'getEdit'])->name('edit')->middleware(['auth', 'verified']);
    Route::post("/edit{id}", [UserController::class, 'postedit'])->name('postedit');
    Route::get("/delete{id}", [UserController::class, 'delete'])->name('delete')->middleware(['auth', 'verified']);
    Route::get("/relations", [UserController::class, 'relations'])->name('relations');
});

Route::prefix('groups')->name('groups.')->group(function () {
    Route::get("/", [GroupController::class, 'index']);
    Route::post("/", [GroupController::class, 'add'])->name('add');
  
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get("/", [PostController::class, 'index'])->name('index');
    Route::get("/add", [PostController::class, 'add'])->name('add');
    Route::post("/add", [PostController::class, 'postAdd'])->name('postAdd');
    Route::get("/delete/{id}", [PostController::class, 'update'])->name('update')->middleware(['auth', 'verified']);
    Route::get("/delete/{id}", [PostController::class, 'delete'])->name('delete')->middleware(['auth', 'verified']);
    Route::post("/delete-any", [PostController::class, 'handleDeleteAny'])->name('delete-any')->middleware(['auth', 'verified']);
    Route::get("/restore/{id}", [PostController::class, 'restore'])->name('restore');
});

Route::prefix('orm')->name('orm.')->group(function () {
    Route::get("/", [OrmController::class, 'index'])->name('index');
    Route::get("/post", [OrmController::class, 'posts'])->name('posts');

});