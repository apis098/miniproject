<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\kategori_bahan_controller;
use App\Http\Controllers\kategori_tipsdasar_controller;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\special_days_controller;
use App\Models\about;
use App\Models\kategori_bahan;

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
    $kategori_bahan = kategori_bahan::paginate(3);
    $about = about::all();
    return view('template.home', compact('kategori_bahan', 'about'));
})->name('home');

Route::get('menu', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    return view('template.menu', compact('kategori_bahan'));
})->name('menu');

Route::get('about', function () {
    $about = about::all();
    return view('template.about', compact('about'));
})->name('about');

Route::get('book', function () {
    return view('template.book');
})->name('book');

Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('kategori', function () {
    return view('admin.kategori');
})->name('kategori');

Route::get('specialday', function () {
    return view('admin.specialday');
})->name('specialday');

Route::get('special-days', [special_days_controller::class, 'index'])->name('SpecialDays.index');
Route::get('/special-days-create', [special_days_controller::class, 'create'])->name('special_days.create');
Route::get('/special-days-edit/{id}', [special_days_controller::class, 'edit'])->name('special_days.edit');
Route::put('/special-days-update/{id}', [special_days_controller::class, 'update'])->name('special_days.update');
Route::post('/special-days-store', [special_days_controller::class, 'store'])->name('special_days.store');
Route::post('special-days/delete/multiple', [special_days_controller::class, 'destroy'])->name('special_days.delete.multiple');

// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::prefix('/admin')->group(function () {
        Route::resource('kategori-bahan', kategori_bahan_controller::class);
        Route::resource('kategori-tipsdasar', kategori_tipsdasar_controller::class);
        Route::resource('kategori_seputardapur',App\Http\Controllers\KategoriSeputardapurController::class);
        Route::resource('seputar_dapur',App\Http\Controllers\SeputarDapurController::class);
        Route::resource('edit-tentang', AboutController::class);
    });
});


// role koki
Route::get('koki/index', [KokiController::class, 'index'])->name('koki.index')->middleware('auth', 'role:koki');
