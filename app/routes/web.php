<?php

use Illuminate\Support\Facades\Route;

// Custom controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationsController;


Route::get('/', function () {
    return view('welcome');
});

// custom routes

Route::middleware(['api'])->group(function () {
    Route::post('api/v1/users/create', [UserController::class, 'CreateNewUser']);
    Route::post('api/v1/users/get', [UserController::class, 'GetUser']);
    
    Route::post('api/v1/organizations/create', [OrganizationsController::class, 'CreateNewOrganizations']);
});