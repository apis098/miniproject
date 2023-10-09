<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\complaintController;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ResepsController;
use App\Http\Controllers\artikels;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\followersController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\special_days_controller;
use App\Http\Controllers\KategoriMakananController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\komentar_resep;
use App\Http\Controllers\LikeCommentController;
use App\Http\Controllers\VeedController;
use App\Http\Controllers\detail_kursusController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\TripayCallbackController;

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

Route::get('/', [LoginController::class, 'home'])->name('home');

Route::get('/artikel/{id}/{judul}', [artikels::class, 'artikel_resep'])->name('artikel.resep');

Route::get('resep', [FiltersController::class, 'resep_index'])->name('resep.home');
Route::post('resep', [FiltersController::class, 'filter_resep'])->name('filter.resep');
Route::get('penawaran-prem',[LoginController::class,'penawaranPrem'])->name('penawaran.prem');
Route::get('keluhan', [LoginController::class, 'keluhan'])->name('keluhan');
Route::get('riwayat', [LoginController::class, 'riwayat'])->name('riwayat');

//kursus
Route::match(['get', 'post'],'/kursus', [KursusController::class, 'kursus_template'])->name('kursus');
route::get('/detail_kursus/{id}',[detail_kursusController::class,'detailKursus'])->name('detail.kursus');
// veed
Route::get('/veed/{uuid?}', [VeedController::class, 'index'])->name('veed.index');


//Search user account
Route::get('search-account', [followersController::class, 'index'])->name('user.koki');
Route::get('/profile-orang-lain/{id}', [followersController::class, 'show_profile'])->name('show.profile');
Route::put('/status-baca/follow/{id}', [notificationController::class, 'followNotification'])->name('follow.notification');
Route::put('/status-baca/like-replies/{id}', [notificationController::class, 'repliesNotification'])->name('replies.notification');
Route::put('/status-baca/like-resep/{id}', [notificationController::class, 'likeResep'])->name('resep.like.notification');
Route::put('/status-baca/shared-feed/{id}', [notificationController::class, 'shareVeed'])->name('share.veed.notification');
Route::put('/status-baca/profile-blocked/{id}', [notificationController::class, 'blockedProfile'])->name('profile.blocked.notification');
Route::put('/status-baca/replies-blocked/{id}', [notificationController::class, 'repliesBlocked'])->name('replies.blocked.notification');
Route::put('/status-baca/tambah-resep/{id}', [notificationController::class, 'recipesNotification'])->name('resep.read.notification');
Route::put('/status-baca/blokir-resep/{id}', [notificationController::class, 'blockedRecipes'])->name('blockedRecipes.notification');
Route::put('/status-baca/blokir-komentar/{id}', [notificationController::class, 'blockedComent'])->name('blockedComent.notification');
Route::put('/status-baca/blokir-keluhan/{id}', [notificationController::class, 'blockedComplaint'])->name('blockedComplaint.notification');


// artikel
Route::post('/favorite-store/{id}', [favoriteController::class, 'store'])->name('favorite.store');
Route::post('/favorite-feed-store/{id}', [favoriteController::class, 'storeVeed'])->name('favorite.feed.store');
Route::post('/favorite-delete/multiple', [favoriteController::class, 'destroyFavorite'])->name('favorite.delete.multiple');

Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::get('voice-note', [testingController::class, 'voice_note'])->name('voice.note');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('update/profile', [KokiController::class, 'updateProfile'])->name('update.profile');
Route::get('delete/profile', [KokiController::class, 'deleteProfilePicture'])->name('delete.profile');



//Keluhan user
Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
Route::get('/keluhan/by-id', [complaintController::class, 'index'])->name('ComplaintUser.index');
Route::put('/keluhan-update/{id}', [complaintController::class, 'update'])->name('ComplaintUser.update');
Route::get('/show-reply-by/{id}', [ReplyController::class, 'show'])->name('ShowReplies.show');
Route::post('/reply-store-by/{id}', [ReplyController::class, 'reply'])->name('ReplyComplaint.store');
Route::post('/replies-store/{id}', [ReplyController::class, 'replyComment'])->name('ReplyComment.store');
Route::post('/comments/{id}/like', [likeController::class, 'like'])->name('Replies.like');
Route::post('/comments/reply/{id}/like', [likeController::class, 'likeBalasan'])->name('Replies.like.balasan');
Route::post('/resep/{id}/like', [likeController::class, 'likeResep'])->name('Resep.like');
Route::post('/comments/{id}/unlike', [LikeController::class, 'unlike'])->name('Replies.unlike');
Route::delete('/reply-destroy/{id}', [ReplyController::class, 'destroy'])->name('ReplyDestroy.destroy');
Route::delete('/reply-comment-destroy/{id}', [ReplyController::class, 'destroyComment'])->name('replyComment.destroy');

//report
Route::post('/laporan-pengguna-store', [ReportController::class, 'store'])->name('Report.store');
Route::post('/laporan-komentar-resep-store/{id}', [ReportController::class, 'store_comment_recipes'])->name('Report.comment.recipes');
Route::post('/laporan-balasan-komentar-resep-store/{id}', [ReportController::class, 'reply_comment_recipes'])->name('Report.reply.comment.recipes');
Route::post('/laporan-resep/{id}',[ReportController::class,'storeResep'])->name('report.resep');
Route::post('/laporan-feed/{id}',[ReportController::class,'storeVeed'])->name('report.feed');
Route::post('/laporan-komentar/{id}',[ReportController::class,'storeReply'])->name('report.reply');
Route::post('/laporan-komentar-balasan/{id}',[ReportController::class,'storeReplyComment'])->name('report.reply.comment');
Route::post('/laporan-keluhan/{id}',[ReportController::class,'storeComplaint'])->name('report.complaint');

Route::prefix('share-content')->group(function (){
    Route::post('feed/{id}',[VeedController::class,'shareVeed'])->name('share.feed');
    Route::get('detail/feed/{id}',[VeedController::class,'detailVeed'])->name('detail.feed');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('complaint/all', [complaintController::class, 'index_all'])->name('Complaint.all');
        Route::get('reply-complaint', [ReplyController::class, 'index'])->name('ReplyUser.index');
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('verifed', [AdminController::class, 'verifed'])->name('admin.verifed');
        Route::patch('verifed/{id}/{status}', [AdminController::class, 'action_verifed'])->name('action.verified');
        Route::get('tawaran', [AdminController::class, 'tawaran'])->name('admin.tawaran');
        Route::get('kursus', [KursusController::class, 'kursus'])->name('admin.kursus');
        // tambah penawaran
        Route::post('upload_penawaran', [AdminController::class, 'upload_tawaran'])->name('upload.tawaran');
        // verifikasi kursus
        Route::patch('verifikasi_kursus/{status}/{id}', [KursusController::class, "eksekusi_kursus"])->name("eksekusi.kursus");
        //report
        Route::get('laporan-pengguna', [ReportController::class, 'index'])->name('Report.index');
        Route::get('keluhan', [ReportController::class, 'keluhan'])->name('Report.keluhan');
        Route::get('komentar', [ReportController::class, 'komentar'])->name('Report.komentar');
        Route::get('profil', [ReportController::class, 'profil'])->name('Report.profil');
        Route::put('content-destroy/{id}', [ReportController::class, 'block'])->name('blockContent.destroy');
        Route::put('block-user/{id}',[ReportController::class,'blockUser'])->name('block.user');
        Route::get('random-profile/{id}', [ReportController::class, 'randomName'])->name('randomName.update');
        Route::get('blocked-user', [ReportController::class, 'blocked_index'])->name('blocked.user.status');
        Route::put('unblock-user/{id}', [ReportController::class, 'unblock_store'])->name('unblock.user.store');
        Route::delete('report-destroy/{id}', [ReportController::class, 'destroy'])->name('Report.destroy');
         // special_days
         Route::resource('special-days', special_days_controller::class);
        //  kategori makanan
         Route::resource('kategori-makanan',KategoriMakananController::class);
        // footer
        Route::resource('footer',FooterController::class);
    });
});

// role koki
Route::middleware(['auth', 'role:koki'],['auth','status:aktif'])->group(function () {
    Route::get('koki/index', [KokiController::class, 'index'])->name('koki.index');
    Route::prefix('/koki')->group(function () {
        Route::resource('resep', ResepsController::class);
        Route::resource('kursus', KursusController::class);
        Route::get('upload-video', [KokiController::class, 'upload_video'])->name('koki.video');
        Route::get('beranda', [KokiController::class, 'beranda'])->name('koki.beranda');
        Route::get('feed', [KokiController::class, 'feed'])->name('koki.feed');
        Route::get('profilage', [KokiController::class, 'profilage'])->name('koki.profilage');
        Route::get('income-koki',[KokiController::class,'incomeKoki'])->name('koki.income');
        Route::get('views-recipe',[KokiController::class,'viewsRecipe'])->name('koki.recipe');
        Route::get('komentar',[KokiController::class,'komentar'])->name('koki.komentar');
        Route::get('favorite',[KokiController::class,'favorite'])->name('koki.favorite');
    });
});

// feed route
Route::post('upload-video', [KokiController::class, 'upload'])->name('upload.video')->middleware("auth");
Route::delete('/hapus_feed/{id}', [KokiController::class, "hapus_feed"])->name('hapus.feed')->middleware("auth");


// like dan favorite pada artikel resep
Route::post('/komentar-resep/{user}/{recipe}/{comment?}', [komentar_resep::class, 'toComment'])->name('komentar.resep')->middleware("auth");
Route::post('/balasan-komentar-resep/{id}', [komentar_resep::class, 'reply_comment'])->name('balasan.komentar.resep')->middleware("auth");
Route::post('/koki/sukai/{id}', [LikeCommentController::class, 'like_comment_recipe'])->name('like.comment.recipe')->middleware('auth');
Route::post('/like/komentar/{user}/{resep}/{comment}', [LikeCommentController::class, 'like_reply_comment_recipe'])->name('like.reply.comment.recipe')->middleware("auth");
Route::post('/koki/sukai/balasan/{id}', [LikeCommentController::class, 'like_reply_comment'])->name('likeReply.comment.recipe')->middleware('auth');
Route::delete('/hapus/komentar-resep/{id}', [komentar_resep::class, 'delete_comment'])->name('delete.comment')->middleware(['auth']);
Route::delete('/hapus/komentar-resep-reply/{id}', [komentar_resep::class, 'delete_reply_comment'])->name('delete.reply.comment')->middleware('auth');

// like dan komentar pada veed
Route::post("like/veed/{user_id}/{veed_id}", [VeedController::class, "sukai_veed"])->name("sukai.veed");
Route::post("/komentar-veed/{user_id}/{veed_id}", [VeedController::class, 'komentar_veed'])->name('komentar.veed');
Route::post("/like/{user_id}/{komentar_veed_id}/{veed_id}", [VeedController::class, 'like_komentar_veed'])->name('like.komentar.veed');
Route::post("/balas/komentar/{user_id}/{comment_id}/{veed_id}", [VeedController::class, 'balas_komentar_veed'])->name('balas.komentar.veed');
Route::post("/sukai/balasan/komentar/{user_id}/{reply_comment_id}/{veed_id}", [VeedController::class, 'sukai_balasan_komentar_veed'])->name('sukai.balasan.komentar.veed');
Route::delete("/hapus_komentar_feed/{id}", [VeedController::class, "hapus_komentar_feed"])->name('hapus.komentar.feed');
Route::delete("/hapus_balasan_komentar_feed/{id}", [VeedController::class, "hapus_balasan_komentar_feed"])->name('hapus.balasan.komentar.feed');

//followers
Route::post('/store-followers/{id}', [followersController::class, 'store'])->name('Followers.store');

// testing payment
Route::get('/testing-payment/{price}/{name_product}', [PaymentController::class, 'channel_pembayaran'])->name('testing.payment')->middleware(['auth', 'role:koki']);
Route::post('/request-pembayaran', [PaymentController::class, 'dapatkan_transaksi'])->name('request.pembayaran')->middleware(['auth', 'role:koki']);
Route::get('/detail-pembayaran/{reference}', [PaymentController::class, 'detail_pembayaran'])->name('detail.pembayaran')->middleware('auth', 'role:koki');
Route::get('/daftar-transaksi', [PaymentController::class, 'daftar_transaksi'])->name('daftar.transaksi');

Route::post('/callback', [TripayCallbackController::class, "handle"]);

// testing leaflet
Route::get("/leafletjs", function () {
    return view('testing.leaflet');
});
