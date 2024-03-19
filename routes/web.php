<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->group(function (){
    Route::middleware('checkLogin')->group(function (){
        Route::name('upload.')->group(function (){
            Route::get('/upload',[UploadController::class,'getUpload'])->name('getUpload');
            Route::post('/upload',[UploadController::class,'postUpload'])->name('postUpload');
        });

        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
        Route::get('/notification',[UploadController::class,'notification'])->name('notification');

        Route::prefix('user')->name('user.')->group(function (){
            Route::post('create',[UserController::class,'create'])->name('create');
            Route::post('change-password',[UserController::class,'changePassword'])->name('change-password');
        });
    });

    Route::middleware('checkLogout')->name('login.')->group(function (){
        Route::get('/login',[AuthController::class,'getLogin'])->name('getLogin');
        Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');
    });
});