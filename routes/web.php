<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\special_days_controller;

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

Route::get('/', function () {
    return view('template.home');
})->name('home');

Route::get('menu', function () {
    return view('template.menu');
})->name('menu');

Route::get('about', function () {
    return view('template.about');
})->name('about');

Route::get('book', function () {
    return view('template.book');
})->name('book');

Route::get('special-days', [special_days_controller::class, 'index'])->name('SpecialDays.index');
Route::get('/special-days-create', [special_days_controller::class, 'create'])->name('special_days.create');
Route::get('/special-days-edit/{id}', [special_days_controller::class, 'edit'])->name('special_days.edit');
Route::put('/special-days-update/{id}', [special_days_controller::class, 'update'])->name('special_days.update');
Route::post('/special-days-store', [special_days_controller::class, 'store'])->name('special_days.store');
Route::post('special-days/delete/multiple', [special_days_controller::class, 'destroy'])->name('special_days.delete.multiple');

// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index')->middleware('auth', 'role:admin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
    
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');




// ->middleware('role:koki');
