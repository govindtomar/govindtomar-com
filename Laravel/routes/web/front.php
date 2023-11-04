<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PackageController;


Route::get('/', [HomeController::class, 'index']);
Route::post('/contact-me', [HomeController::class, 'contactMe']);
Route::get('/package/user-role-permission', [PackageController::class, 'userRolePermission']);
Route::get('/package/crud-generator', [PackageController::class, 'crudGenerator']);