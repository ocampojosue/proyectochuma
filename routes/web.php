<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Teacher\EvaluationController;
use App\Http\Controllers\Teacher\ThemeController;
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
Route::get('/', function () {
    return view('home');
})->middleware('auth');
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/homelivewire', HomeController::class)->name('homelivewire');
    Route::resource('/users', UserController::class)->names('admin.users');
});
Route::middleware(['auth'])->prefix('profesor')->group(function () {
    Route::resource('/themes', ThemeController::class)->names('profesor.themes');
    Route::resource('/evaluations', EvaluationController::class)->names('profesor.evaluations');
});
