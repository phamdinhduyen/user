<?php

use App\Models\User;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;

Route::prefix('')->name('user.')->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/add", [UserController::class, 'add'])->name('add');
    Route::post("/add", [UserController::class, 'postadd'])->name('postadd');
    Route::get("/edit{id}", [UserController::class, 'getEdit'])->name('edit');
    Route::post("/edit{id}", [UserController::class, 'postedit'])->name('postedit');
    Route::get("/delete{id}", [UserController::class, 'delete'])->name('delete');
});

Route::prefix('groups')->name('groups.')->group(function () {
    Route::get("/", [GroupController::class, 'index'])->name('index');
    Route::post("/", [GroupController::class, 'add'])->name('add');
  
});