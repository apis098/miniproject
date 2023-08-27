<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\complaintController;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ResepsController;
use App\Models\complaint;
use App\Models\reseps;
use App\Http\Controllers\artikels;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\followersController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\special_days_controller;
use App\Http\Controllers\KategoriMakananController;
use App\Http\Controllers\testingController;
use App\Models\bahan_reseps;
use App\Models\favorite;
use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

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
    $complaints = complaint::paginate(3);
    $real_reseps = reseps::paginate(2);
    $userLogin = Auth::user();
    $notification = [];
    $favorite =[];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();

    }
    if ($userLogin) {
        $favorite = favorite::where('user_id_from', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

    return view('template.home', compact('real_reseps','userLogin', 'complaints','notification','unreadNotificationCount','favorite'));
})->name('home');

Route::get('/artikel/{id}/{judul}', [artikels::class, 'artikel_resep'])->name('artikel.resep');
Route::get('resep', [FiltersController::class, 'resep_index'])->name('resep.home');

Route::get('about', function () {
    $userLogin = Auth::user();
    $notification = [];
    $favorite = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    if ($userLogin) {
        $favorite = favorite::where('user_id_from', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }
    return view('template.about', compact('notification','unreadNotificationCount','userLogin','favorite'));
})->name('about');

//Search user account
Route::get('search-account', [followersController::class, 'index'])->name('user.koki');
Route::get('/profile-orang-lain/{id}', [followersController::class, 'show_profile'])->name('show.profile');
Route::put('/status-baca/follow/{id}', [notificationController::class, 'followNotification'])->name('follow.notification');
Route::put('/status-baca/like-replies/{id}', [notificationController::class, 'repliesNotification'])->name('replies.notification');
Route::put('/status-baca/like-resep/{id}', [notificationController::class, 'likeResep'])->name('resep.like.notification');
Route::put('/status-baca/profile-blocked/{id}', [notificationController::class, 'blockedProfile'])->name('profile.blocked.notification');
Route::put('/status-baca/replies-blocked/{id}', [notificationController::class, 'repliesBlocked'])->name('replies.blocked.notification');
Route::put('/status-baca/tambah-resep/{id}', [notificationController::class, 'recipesNotification'])->name('resep.read.notification');


// artikel
Route::post('/favorite-store/{id}', [favoriteController::class, 'store'])->name('favorite.store');
Route::post('/favorite-delete/multiple', [favoriteController::class, 'destroy'])->name('favorite.delete.multiple');

Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('update/profile', [KokiController::class, 'updateProfile'])->name('update.profile');
Route::get('delete/profile', [KokiController::class, 'deleteProfilePicture'])->name('delete.profile');


//Keluhan user
Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
Route::get('/keluhan/by-id', [complaintController::class, 'index'])->name('ComplaintUser.index');
Route::put('/keluhan-update/{id}', [complaintController::class, 'update'])->name('ComplaintUser.update');
Route::get('/show-reply-by/{id}', [ReplyController::class, 'show'])->name('ShowReplies.show');
Route::post('/reply-store-by/{id}', [ReplyController::class, 'reply'])->name('ReplyComplaint.store');
Route::post('/comments/{id}/like', [likeController::class, 'like'])->name('Replies.like');
Route::post('/resep/{id}/like', [likeController::class, 'likeResep'])->name('Resep.like');
Route::post('/comments/{id}/unlike', [LikeController::class, 'unlike'])->name('Replies.unlike');
Route::delete('/reply-destroy/{id}', [ReplyController::class, 'destroy'])->name('ReplyDestroy.destroy');
//report
Route::post('/laporan-pengguna-store', [ReportController::class, 'store'])->name('Report.store');
Route::post('/laporan-resep/{id}',[ReportController::class,'storeResep'])->name('report.resep');
Route::post('/laporan-komentar/{id}',[ReportController::class,'storeReply'])->name('report.reply');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/complaint/all', [complaintController::class, 'index_all'])->name('Complaint.all');
        Route::get('/reply-complaint', [ReplyController::class, 'index'])->name('ReplyUser.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        //report
        Route::get('/laporan-pengguna', [ReportController::class, 'index'])->name('Report.index');
        Route::delete('/content-destroy/{id}', [ReportController::class, 'block'])->name('ReplyBlocked.destroy');
        Route::delete('/report-destroy/{id}', [ReportController::class, 'destroy'])->name('Report.destroy');
         // special_days
         Route::resource('/special-days', special_days_controller::class);
        //  kategori makanan
         Route::resource('/kategori-makanan',KategoriMakananController::class);
    });
});

// role koki
Route::middleware(['auth', 'role:koki'],['auth','status:aktif'])->group(function () {
    Route::get('koki/index', [KokiController::class, 'index'])->name('koki.index');
    Route::prefix('/koki')->group(function () {

        Route::resource('resep', ResepsController::class);
    });
});
//followers
Route::post('/store-followers/{id}', [followersController::class, 'store'])->name('Followers.store');
