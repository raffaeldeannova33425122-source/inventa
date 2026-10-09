<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->file(public_path('index.html'));
});

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// admin Aplikasi
Route::get('dashboard_admin_apk', function () {
    return view('admin_apk/dashboard_admin_apk');
})->name('dashboard_admin_apk');

Route::get('manajemen_admin', function () {
    return view('admin_apk/manajemen_admin');
})->name('manajemen_admin');

Route::get('master_data', function () {
    return view('admin_apk/master_data');
})->name('master_data');

Route::get('log_sistem', function () {
    return view('admin_apk/log_sistem');
})->name('log_sistem');



// admin UKM
Route::get('approval_page', function () {
    return view('admin_ukm/approval_page');
})->name('approval_page');

Route::get('peminjaman_aktif', function () {
    return view('admin_ukm/peminjaman_aktif');
})->name('peminjaman_aktif');

Route::get('manajemen_inventaris', function () {
    return view('admin_ukm/manajemen_inventaris');
})->name('manajemen_inventaris');

Route::get('profil_ukm', function () {
    return view('admin_ukm/profil_ukm');
})->name('profil_ukm');