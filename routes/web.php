<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\LoginController;

use App\Http\Middleware\UserAccessDashboardMiddleware;


Route::get('/vue/{n1?}/{n2?}/{n3?}', function () {
    return view('vue');
});

Route::post('user/login',[LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard'],function(){
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});

Route::group(['prefix' => 'blog'],function(){

    Route::get('', [BlogController::class, 'index'])->name('blog.index');
    Route::get('detail/{post}', [BlogController::class, 'show'])->name('blog.show');

});

Route::get('/', function(){
    return ['Larevel'=>app()->version()];
});
 
require __DIR__.'/auth.php';
