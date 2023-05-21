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

Route::middleware(['2fa'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});
  
Route::get('/complete-registration', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('complete.registration');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-company', [App\Http\Controllers\CompanyController::class, 'new'])->name('new-company')->middleware('auth');
Route::post('/store-company', [App\Http\Controllers\CompanyController::class, 'store'])->name('store-company')->middleware('auth');
Route::get('/company/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('company-show')->middleware('auth');
Route::delete('/company-delete/{id}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('company-delete')->middleware('auth');
Route::get('/company-edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company-edit')->middleware('auth');
Route::put('/update-company/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('edit-company')->middleware('auth');