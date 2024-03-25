<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->group(function () {
    Route::middleware('checkLogin')->group(function () {
        Route::name('file.')->group(function () {
            Route::get('/', [FileController::class, 'getUpload'])->name('getUpload');
            Route::post('upload', [FileController::class, 'postUpload'])->name('postUpload');
            Route::get('history-file', [FileController::class, 'historyFile'])->name('historyFile');
            Route::get('anyDataHistoryFile', [FileController::class, 'anyData'])->name('anyData');
        });

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('notification', [FileController::class, 'notification'])->name('notification');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('change-password');

        Route::middleware('checkRole')->prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'list'])->name('list');
            Route::get('anyData', [UserController::class, 'anyData'])->name('anyData');
            Route::post('create', [UserController::class, 'create'])->name('create');
            Route::post('edit', [UserController::class, 'edit'])->name('edit');
            Route::post('update', [UserController::class, 'update'])->name('update');
        });
    });

    Route::middleware('checkLogout')->name('login.')->group(function () {
        Route::get('login', [AuthController::class, 'getLogin'])->name('getLogin');
        Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
    });
});