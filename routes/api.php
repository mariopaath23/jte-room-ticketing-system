<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


  // Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Public Routes
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}', [RoomController::class, 'show']);
Route::get('/schedule', [TicketController::class, 'schedule']);

// Protected Routes (Requires Authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/tickets', [TicketController::class, 'store']);
    Route::post('/rooms', [RoomController::class, 'create']);

    // Admin-specific route
    Route::patch('/tickets/{ticket}/approve', [TicketController::class, 'approve'])->middleware('can:approve,ticket');
});