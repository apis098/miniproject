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
use App\Http\Controllers\followersController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\testingController;
use App\Models\bahan_reseps;
use App\Models\notifications;
use Illuminate\Http\Request;
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

Route::get('/profile', function () {
    return view('template.profile');
});



Route::get('/', function () {
    $complaints = complaint::all();
    $real_reseps = reseps::paginate(4);
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
       
    }
    return view('template.home', compact('real_reseps','userLogin', 'complaints','notification','unreadNotificationCount'));
})->name('home');

Route::get('artikel', function () {
    $reseps = reseps::paginate(3);
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    return view('template.artikel', compact('reseps','userLogin', 'notification','unreadNotificationCount'));
})->name('artikel');

Route::get('menu', function () {
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    return view('template.menu', compact('notification','unreadNotificationCount','userLogin'));
})->name('menu');

Route::post('/menu', function (Request $request) {
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    return view('template.menu', compact('notification','unreadNotificationCount','userLogin'));
});

Route::get('about', function () {
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    return view('template.about', compact('notification','unreadNotificationCount','userLogin'));
})->name('about');

Route::get('hari', function () {
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    return view('template.hari', compact('notification','unreadNotificationCount','userLogin'));
})->name('hari');

Route::post('hari', function (Request $request) {
    $userLogin = Auth::user();
    $notification = [];
    $unreadNotificationCount=[];
    if ($userLogin) {
        $notification = notifications::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
    }
    return view('template.hari', compact('notification','unreadNotificationCount','userLogin'));
});

//Search user account
Route::get('search-account', [followersController::class, 'index'])->name('user.koki');
Route::get('/profile-orang-lain/{id}', [followersController::class, 'show_profile'])->name('show.profile');
Route::put('/status-baca/follow/{id}', [notificationController::class, 'followNotification'])->name('follow.notification');
Route::put('/status-baca/like-replies/{id}', [notificationController::class, 'repliesNotification'])->name('replies.notification');
Route::put('/status-baca/profile-blocked/{id}', [notificationController::class, 'blockedProfile'])->name('profile.blocked.notification');


// artikel
Route::get('menu/{id}', [artikels::class, 'artikel_resep']);

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
Route::post('/comments/{id}/unlike', [LikeController::class, 'unlike'])->name('Replies.unlike');
Route::delete('/reply-destroy/{id}', [ReplyController::class, 'destroy'])->name('ReplyDestroy.destroy');
//report
Route::post('/laporan-pengguna-store', [ReportController::class, 'store'])->name('Report.store');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/complaint/all', [complaintController::class, 'index_all'])->name('Complaint.all');
        Route::get('/reply-complaint', [ReplyController::class, 'index'])->name('ReplyUser.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        //report
        Route::get('/laporan-pengguna', [ReportController::class, 'index'])->name('Report.index');
        Route::delete('/content-destroy/{id}', [ReportController::class, 'block'])->name('ReplyBlocked.destroy');
        Route::delete('/report-destroy/{id}', [ReportController::class, 'destroy'])->name('Report.destroy');
    });
});

// role koki
Route::middleware(['auth', 'role:koki'],['auth','status:aktif'])->group(function () {
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

Route::get('/test', function () {
    return view('template.test');
});