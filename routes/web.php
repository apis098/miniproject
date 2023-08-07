<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\basic_tips_controller;
use App\Http\Controllers\complaintController;
use App\Http\Controllers\kategori_bahan_controller;
use App\Http\Controllers\kategori_tipsdasar_controller;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ResepsController;
use App\Http\Controllers\special_days_controller;
use App\Models\about;
use App\Models\basic_tips;
use App\Models\complaint;
use App\Models\kategori_bahan;
use App\Models\reseps;
use App\Models\special_days;
use Illuminate\Http\Request;

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
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    $reseps = kategori_bahan::all();
    $complaints = complaint::all();
    return view('template.home', compact('kategori_bahan', 'reseps', 'about', 'bahan_masakan', 'hari_khusus', 'tips_dasar','complaints'));
})->name('home');

Route::post('/', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $about = about::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    $reseps = kategori_bahan::where('id', $request->bahan)->get();
    $complaints = complaint::all();
    return view('template.home', compact('kategori_bahan', 'reseps', 'about', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'complaints'));
});

Route::get('artikel', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $about = about::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    $reseps = reseps::paginate(3);
    return view('template.artikel', compact('kategori_bahan', 'reseps', 'about', 'bahan_masakan', 'hari_khusus', 'tips_dasar'));
})->name('artikel');

Route::get('menu', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $reseps = kategori_bahan::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.menu', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
})->name('menu');

Route::post('/menu', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $bahan_masakan = kategori_bahan::all();
    $reseps = kategori_bahan::where('id', $request->bahan)->get();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.menu', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
});

Route::get('about', function () {
    $about = about::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.about', compact('about', 'bahan_masakan', 'hari_khusus', 'tips_dasar'));
})->name('about');

Route::get('hari', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $reseps = kategori_bahan::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.hari', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
})->name('hari');

Route::post('hari', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $bahan_masakan = kategori_bahan::all();
    $reseps = kategori_bahan::where('id', $request->bahan)->get();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.hari', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
});

Route::get('seputar_dpr', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $reseps = kategori_bahan::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.seputar_dpr', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
})->name('seputar_dpr');

Route::post('seputar_dpr', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $bahan_masakan = kategori_bahan::all();
    $reseps = kategori_bahan::where('id', $request->bahan)->get();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.seputar_dpr', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
});

Route::get('tips_dsr', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $reseps = kategori_bahan::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.tips_dsr', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
})->name('tips_dsr');

Route::post('tips_dsr', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $bahan_masakan = kategori_bahan::all();
    $reseps = kategori_bahan::where('id', $request->bahan)->get();
    $hari_khusus = special_days::all();
    $tips_dasar = basic_tips::all();
    return view('template.tips_dsr', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'tips_dasar', 'reseps'));
});

Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('kategori', function () {
    return view('admin.kategori');
})->name('kategori');

Route::get('specialday', function () {
    return view('admin.specialday');
})->name('specialday');

Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

//Keluhan user
Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
Route::get('/keluhan-admin', [complaintController::class, 'index'])->name('ComplaintUser.index');
Route::put('/keluhan-update/{id}',[complaintController::class,'update'])->name('ComplaintUser.update');
Route::get('/reply-complaint', [ReplyController::class, 'index'])->name('ReplyUser.index');
Route::get('/show-reply-by/{id}', [ReplyController::class, 'show'])->name('ShowReplies.show');
Route::post('/reply-store-by/{id}',[ReplyController::class,'reply'])->name('ReplyComplaint.store');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::prefix('/admin')->group(function () {
        //Hari Khusus
        Route::get('special-days', [special_days_controller::class, 'index'])->name('SpecialDays.index');
        Route::get('/special-days-create', [special_days_controller::class, 'create'])->name('SpecialDays.create');
        Route::get('/special-days-edit/{id}', [special_days_controller::class, 'edit'])->name('SpecialDays.edit');
        Route::get('special-days/{id}', [special_days_controller::class, 'show'])->name('SpecialDays.show');
        Route::put('/special-days-update/{id}', [special_days_controller::class, 'update'])->name('SpecialDays.update');
        Route::post('/special-days-store', [special_days_controller::class, 'store'])->name('SpecialDays.store');
        Route::delete('special-days-delete/{id}', [special_days_controller::class, 'destroy'])->name('SpecialDays.destroy');

        //Tips Dasar
        Route::get('basic-tips', [basic_tips_controller::class, 'index'])->name('BasicTips.index');
        Route::get('/basic-tips-create', [basic_tips_controller::class, 'create'])->name('BasicTips.create');
        Route::post('/basic-tips-store', [basic_tips_controller::class, 'store'])->name('BasicTips.store');
        Route::get('/basic-tips-edit/{id}', [basic_tips_controller::class, 'edit'])->name('BasicTips.edit');
        Route::put('/basic-tips-update/{id}', [basic_tips_controller::class, 'update'])->name('BasicTips.update');
        Route::get('basic-tips/{id}', [basic_tips_controller::class, 'show'])->name('BasicTips.show');
        Route::delete('basic-tips-delete/{id}', [basic_tips_controller::class, 'destroy'])->name('BasicTips.destroy');

        Route::resource('kategori-bahan', kategori_bahan_controller::class);
        Route::resource('kategori-tipsdasar', kategori_tipsdasar_controller::class);
        Route::resource('kategori_seputardapur', App\Http\Controllers\KategoriSeputardapurController::class);
        Route::resource('edit-tentang', AboutController::class);
    });
});

// role koki
Route::middleware(['auth', 'role:koki'])->group(function () {
    Route::get('koki/index', [KokiController::class, 'index'])->name('koki.index');
    Route::prefix('/koki')->group(function () {

        Route::resource('resep', ResepsController::class);
        Route::resource('seputar_dapur', App\Http\Controllers\SeputarDapurController::class);
    });
});
