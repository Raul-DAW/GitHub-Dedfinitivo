<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');

Route::view('/buttons', 'admin.buttons')->name('buttons');
Route::view('/cards', 'admin.cards')->name('cards');

Route::view('/utilities-color', 'admin.utilities-color')->name('utilities.color');
Route::view('/utilities-border', 'admin.utilities-border')->name('utilities.border');
Route::view('/utilities-animation', 'admin.utilities-animation')->name('utilities.animation');
Route::view('/utilities-other', 'admin.utilities-other')->name('utilities.other');

Route::view('/login', 'admin.login')->name('login');
Route::view('/register', 'admin.register')->name('register');
Route::view('/forgot-password', 'admin.forgot-password')->name('forgot');

Route::view('/404', 'admin.404')->name('error404');
Route::view('/blank', 'admin.blank')->name('blank');

Route::view('/charts', 'admin.charts')->name('charts');
Route::view('/tables', 'admin.tables')->name('tables');