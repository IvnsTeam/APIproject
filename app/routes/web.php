<?php

use Illuminate\Support\Facades\Route;

// Custom controllers
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// custom routes

Route::middleware(['api'])->group(function () {
    Route::post('api/v1/users/create', [UserController::class, 'CreateNewUser']);
    Route::post('api/v1/users/get', [UserController::class, 'GetUser']);
});