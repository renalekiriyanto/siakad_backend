<?php

use App\Http\Controllers\API\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
->prefix('user')
->group(function(){
    Route::get('/list', 'listUser');
    Route::get('/{userid}', 'getUserByUuid');
});
