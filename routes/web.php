<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin_apk_dashboard', function () {
    return view('admin_apk/admin_apk_dashboard');
});