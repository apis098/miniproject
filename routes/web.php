<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\complaintController;
use App\Http\Controllers\kategori_bahan_controller;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ResepsController;
use App\Http\Controllers\special_days_controller;
use App\Models\about;
use App\Models\complaint;
use App\Models\kategori_bahan;
use App\Models\reseps;
use App\Models\special_days;
use App\Http\Controllers\artikels;
use App\Http\Controllers\followersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\testingController;
use App\Models\notifications;
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

Route::get('/profile', function () {
    return view('template.profile');
});

Route::get('/resep', function () {
    return view('template.resep');
});

Route::get('/profile-orang-lain', function () {
    return view('template.profile-oranglain');
});

Route::get('/', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $about = about::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $reseps = kategori_bahan::all();
    $complaints = complaint::all();
    $real_reseps = reseps::paginate(4);
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.home', compact('real_reseps', 'kategori_bahan', 'reseps', 'about', 'bahan_masakan', 'hari_khusus', 'complaints','notification'));
})->name('home');

Route::get('artikel', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $about = about::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $reseps = reseps::paginate(3);
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.artikel', compact('kategori_bahan', 'reseps', 'about', 'bahan_masakan', 'hari_khusus','notification'));
})->name('artikel');

Route::get('menu', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $reseps = kategori_bahan::paginate(4);
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.menu', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'reseps','notification'));
})->name('menu');

Route::post('/menu', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $bahan_masakan = kategori_bahan::all();
    // mengambil inputan array
    $bahan = $request->input('bahan', []);
    // whereIn untuk filter beberapa request
    $reseps = kategori_bahan::whereIn('id', $bahan)->paginate(4);
    $hari_khusus = special_days::all();
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.menu', compact('kategori_bahan', 'bahan_masakan', 'hari_khusus', 'reseps','notification'));
});

Route::get('about', function () {
    $about = about::all();
    $bahan_masakan = kategori_bahan::all();
    $hari_khusus = special_days::all();
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.about', compact('about', 'bahan_masakan', 'hari_khusus','notification'));
})->name('about');

Route::get('hari', function () {
    $kategori_bahan = kategori_bahan::paginate(3);
    $reseps = special_days::paginate(3);
    $specialdays = special_days::all();
    $hari_khusus = special_days::all();
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.hari', compact('kategori_bahan', 'specialdays', 'hari_khusus', 'reseps','notification'));
})->name('hari');

Route::post('hari', function (Request $request) {
    $kategori_bahan = kategori_bahan::paginate(3);
    $specialdays = special_days::all();
    $reseps = special_days::where('id', $request->day)->paginate(3);
    $hari_khusus = special_days::all();
    $notification = notifications::where('user_id',auth()->user()->id)->get();
    return view('template.hari', compact('kategori_bahan', 'specialdays', 'hari_khusus', 'reseps','notification'));
});

//Search user account
Route::get('search-account', [followersController::class, 'index'])->name('user.koki');


// artikel
Route::get('menu/{id}', [artikels::class, 'artikel_resep']);


Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('dashboardt', function () {
    return view('koki.dashboardt');
})->name('dashboardt');


Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

//Keluhan user
Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
Route::get('/keluhan/by-id', [complaintController::class, 'index'])->name('ComplaintUser.index');
Route::put('/keluhan-update/{id}', [complaintController::class, 'update'])->name('ComplaintUser.update');
Route::get('/reply-complaint', [ReplyController::class, 'index'])->name('ReplyUser.index');
Route::get('/show-reply-by/{id}', [ReplyController::class, 'show'])->name('ShowReplies.show');
Route::post('/reply-store-by/{id}', [ReplyController::class, 'reply'])->name('ReplyComplaint.store');
Route::post('/comments/{id}/like', [likeController::class, 'like'])->name('Replies.like');
Route::post('/comments/{id}/unlike', [LikeController::class, 'unlike'])->name('Replies.unlike');
Route::delete('/reply-destroy/{id}', [ReplyController::class, 'destroy'])->name('ReplyDestroy.destroy');
Route::get('/complaint/all', [complaintController::class, 'index_all'])->name('Complaint.all');
//report
Route::post('/laporan-pengguna-store', [ReportController::class, 'store'])->name('Report.store');



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

        //report
        Route::get('/laporan-pengguna', [ReportController::class, 'index'])->name('Report.index');
        Route::delete('/content-destroy/{id}', [ReportController::class, 'block'])->name('ReplyBlocked.destroy');
        Route::delete('/report-destroy/{id}', [ReportController::class, 'destroy'])->name('Report.destroy');

        Route::resource('kategori-bahan', kategori_bahan_controller::class);
        Route::resource('edit-tentang', AboutController::class);
    });
});

// role koki
Route::middleware(['auth', 'role:koki'])->group(function () {
    Route::get('koki/index', [KokiController::class, 'index'])->name('koki.index');
    Route::prefix('/koki')->group(function () {

        Route::resource('resep', ResepsController::class);

    });
});

//testing
Route::get('/testing-dynamic-input', [testingController::class, 'create'])->name('Testing.create');
Route::post('/store-dynamic-input', [testingController::class, 'store'])->name('Testing.store');

//followers
Route::post('/store-followers/{id}', [followersController::class, 'store'])->name('Followers.store');
