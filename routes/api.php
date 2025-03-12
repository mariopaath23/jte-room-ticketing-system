<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}', [RoomController::class, 'show']);
Route::get('/schedule', [TicketController::class, 'schedule']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    //Student-specific route
    Route::middleware(RoleMiddleware::class . ':student')->group(function(){
      Route::post('/tickets', [TicketController::class, 'store']);
    });

    //Admin-specific route
    Route::middleware(RoleMiddleware::class . ':admin')->group(function(){
      Route::post('/rooms', [RoomController::class, 'create']);
      Route::patch('/tickets/{ticket}/approve', [TicketController::class, 'approve'])->middleware('can:approve,ticket');
    });

    Route::middleware(RoleMiddleware::class . ':superadmin')->group(function () {
      Route::delete('/rooms/{id}', [RoomController::class, 'destroy']);
      Route::delete('/users/{id}', [AuthController::class, 'deleteUser']);
    });
});