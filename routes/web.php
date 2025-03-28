<?php

use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/user/{user}/toggle-lock', [UserController::class, 'toggleLock'])->name('users.toggle-lock');
    Route::post('/user/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
    Route::post('/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('admin.user.remove-admin');
});

Route::get('/', function () {
    return view('client.home');
});
