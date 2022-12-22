<?php

use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/homelivewire', HomeController::class)->name('homelivewire');
    Route::resource('/users', UserController::class)->names('admin.users');
    Route::resource('/themes', ThemeController::class)->names('admin.themes');
});
