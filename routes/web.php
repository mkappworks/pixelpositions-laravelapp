<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [JobController::class, 'create']);
    Route::post('/jobs', [JobController::class, 'store']);
});

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistrationController::class, 'create']);
    Route::post('/register', [RegistrationController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy']);
});
