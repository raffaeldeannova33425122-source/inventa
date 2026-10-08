<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('manajemen_admin', function () {
    return view('admin_apk/manajemen_admin');
});

Route::get('master_data', function () {
    return view('admin_apk/master_data');
});

Route::get('log_sistem', function () {
    return view('admin_apk/log_sistem');
});