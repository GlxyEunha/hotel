<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function(){
    return view('index');
});
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');


Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/room', [RoomController::class, 'index']);
Route::get('/dashboard/room/create', [RoomController::class, 'create']);
Route::get('/dashboard/room/{id}/edit', [RoomController::class, 'edit']);
Route::get('/dashboard/room/{room:no}', [RoomController::class, 'show']);
Route::post('/dashboard/room/{id}/edit', [RoomController::class, 'update']);
Route::post('/dashboard/room/post', [RoomController::class, 'post']);
Route::any('/dashboard/room/{id}/delete', [RoomController::class, 'delete'])->name('room.delete');

Route::get('/dashboard/status', [StatusController::class, 'index']);
Route::get('/dashboard/status/create', [StatusController::class, 'create']);
Route::post('/dashboard/status/post', [StatusController::class, 'post']);
Route::get('/dashboard/status/{id}/edit', [StatusController::class, 'edit']);
Route::post('/dashboard/status/{id}/update', [StatusController::class, 'update']);
Route::any('/dashboard/status/{id}/delete', [StatusController::class, 'delete']);

Route::get('/dashboard/type', [TypeController::class, 'index']);
Route::get('/dashboard/type/create', [TypeController::class, 'create']);
Route::get('/dashboard/type/{id}/edit', [TypeController::class, 'edit']);
Route::post('/dashboard/type/post', [TypeController::class, 'post']);
Route::post('/dashboard/type/{id}/update', [TypeController::class, 'update']);
Route::any('/dashboard/type/{id}/delete', [TypeController::class, 'delete']);

Route::get('/dashboard/user', [UserController::class, 'index']);
Route::get('/dashboard/user/create', [UserController::class, 'create']);
Route::get('/dashboard/user/{user:username}/edit', [UserController::class, 'edit']);
// Route::get('/dashboard/user/{user:username}/show', [UserController::class, 'p']);
Route::post('/dashboard/user/post', [UserController::class, 'post']);
Route::post('/dashboard/user/{id}/update', [UserController::class, 'update']);
Route::any('/dashboard/user/{id}/delete', [UserController::class, 'delete']);
