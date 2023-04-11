<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Create 
Route::get('/', function () {
    return view('welcome');
});
Route::post('/', [ProductController::class, 'create']);

// Read
Route::get('/show', [ProductController::class, 'read']);

// Update
Route::get('/edit/{id}', [ProductController::class, 'showUpdate']);
Route::post('/edit/{id}', [ProductController::class, 'update']);

// Delete
Route::get('/remove/{id}', [ProductController::class, 'delete']);
