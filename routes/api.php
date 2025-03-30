<?php

use App\Http\Controllers\API\PasswordResetController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

route::post('/forget-password', [PasswordResetController::class, 'forgetPassword']);

route::group(['middleware'=>'api'], function(){
    route::post('/register', [UserController::class, 'register']);
    route::post('/login', [UserController::class, 'login']);
    route::get('/logout', [UserController::class, 'logout']);
    route::get('/profile', [UserController::class, 'profile']);
    route::post('/update-profile', [UserController::class, 'updateProfile']);
    route::get('/send-verify-mail/{email}', [UserController::class, 'sendVerifyMail']);
    route::get('/refresh-token', [UserController::class, 'refreshToken']);

    route::post('/tasks',[TasksController::class, 'create']);
    route::get('/tasks',[TasksController::class, 'list']);
    route::get('/tasks/{id}',[TasksController::class, 'get']);
    route::post('/tasks/{id}',[TasksController::class, 'update']);
    route::delete('/tasks/{id}',[TasksController::class, 'delete']);
});







