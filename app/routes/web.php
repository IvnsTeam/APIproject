<?php

use Illuminate\Support\Facades\Route;

// Custom controllers
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// custom routes
Route::get('/users/create', [UserController::class, 'CreateNewUser']);
Route::get('/users/get', [UserController::class, 'GetUser']);