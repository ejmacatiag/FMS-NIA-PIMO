<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::resource('boxes', BoxController::class);
Route::resource('folders', FolderController::class);
Route::resource('files', FileController::class);
