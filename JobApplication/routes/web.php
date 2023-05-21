<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-company', [App\Http\Controllers\CompanyController::class, 'new'])->name('new-company')->middleware('auth');
Route::post('/store-company', [App\Http\Controllers\CompanyController::class, 'store'])->name('store-company')->middleware('auth');
Route::get('/company/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('company-show')->middleware('auth');