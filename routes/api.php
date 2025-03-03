<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;

Route::get('/user',function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::get('category/all', [CategoryController::class,'all']);

Route::resource('category', CategoryController::class)->except(['create','edit']);

Route::get('post/all', [PostController::class,'all']);

Route::resource('post', PostController::class)->except(['create','edit']);

