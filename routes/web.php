<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    return view('client.home');
});
