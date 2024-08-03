<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCategoryController;

Route::get('/', function () {
    return view('welcome');
});

// guest middleware
Route::middleware('guest')->group(function(){
    // authentication
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});

// auth middleware
Route::middleware('auth')->group(function(){
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('only.admin');

    // books
    Route::get('/dashboard/books/trash', [DashboardBookController::class, 'trash'])->middleware('only.admin');
    Route::resource('/dashboard/books', DashboardBookController::class)->middleware('only.admin');
    Route::post('/dashboard/books/{book:slug}/restore', [DashboardBookController::class, 'restore'])->middleware('only.admin');
    Route::delete('/dashboard/books/{book:slug}/forceDelete', [DashboardBookController::class, 'forceDelete'])->middleware('only.admin');
    // categories
    Route::get('/dashboard/categories/trash', [DashboardCategoryController::class, 'trash'])->middleware('only.admin');
    Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show')->middleware('only.admin');
    Route::post('/dashboard/categories/{category:slug}/restore', [DashboardCategoryController::class, 'restore'])->middleware('only.admin');
    Route::delete('/dashboard/categories/{category:slug}/forceDelete', [DashboardCategoryController::class, 'forceDelete'])->middleware('only.admin');
    // users
    Route::get('/dashboard/users/activation', [DashboardUserController::class, 'activation'])->middleware('only.admin');
    Route::get('/dashboard/users/banned', [DashboardUserController::class, 'banned'])->middleware('only.admin');
    Route::resource('/dashboard/users', DashboardUserController::class)->middleware('only.admin');
    Route::put('/dashboard/users/{user:username}/activate', [DashboardUserController::class, 'activate'])->middleware('only.admin');
    Route::put('/dashboard/users/{user:username}/ban', [DashboardUserController::class, 'ban'])->middleware('only.admin');
    Route::put('/dashboard/users/{user:username}/unban', [DashboardUserController::class, 'unban'])->middleware('only.admin');

    Route::get('/dashboard/rent-logs', function(){
        return view('dashboard.rent-logs.index');
    })->middleware('only.admin');

    // clients
    Route::get('/profile', function(){
        return view('clients.profile');
    })->middleware('only.client');
    
    Route::get('/books', function () {
        return view('books');
    });

    // logout
    Route::post('/logout', [AuthController::class, 'logout']);
});