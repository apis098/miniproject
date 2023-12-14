<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ResepsController;
use App\Http\Controllers\ArtikelsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpecialDaysController;
use App\Http\Controllers\KategoriMakananController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\KomentarResepController;
use App\Http\Controllers\LikeCommentController;
use App\Http\Controllers\VeedController;
use App\Http\Controllers\DetailKursusController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\TripayCallbackController;
use App\Http\Controllers\IncomeChefsController;
use App\Http\Controllers\ReservasiKursusController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UlasanRatingController;
use App\Models\Notifications;

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

Route::get('/artikel/{id}/{judul}', [ArtikelsController::class, 'artikel_resep'])->name('artikel.resep')->middleware('auth.premium');

Route::get('resep', [FiltersController::class, 'resep_index'])->name('resep.home');
Route::post('resep', [FiltersController::class, 'filter_resep'])->name('filter.resep');
Route::get('penawaran-premium',[LoginController::class,'penawaranPremium'])->name('penawaran.premium');
Route::get('keluhan', [LoginController::class, 'keluhan'])->name('keluhan');
Route::get('riwayat', [LoginController::class, 'riwayat'])->name('riwayat');

//kursus
Route::match(['get', 'post'],'/kursus', [KursusController::class, 'kursus_template'])->name('kursus');
Route::get('/detail_kursus/{id}',[DetailKursusController::class,'detailKursus'])->name('detail.kursus');
Route::get('/reservasi-kursus/{id}',[ReservasiKursusController::class,'reservasiKursus'])->name('reservasi.kursus');
Route::post('/transaksi-kursus/{id}/{user}/{chef}', [ReservasiKursusController::class, 'transaksiKursus'])->name('transaksi.kursus');
Route::get('/invoice-kursus/{id}',[ReservasiKursusController::class,'invoiceKursus'])->name('invoice.kursus');
// veed
Route::get('/veed/{uuid?}', [VeedController::class, 'index'])->name('veed.index');


//Search user account
Route::get('search-account', [FollowersController::class, 'index'])->name('user.koki');
Route::get('/profile-orang-lain/{id}', [FollowersController::class, 'show_profile'])->name('show.profile');
Route::put('/status-baca/follow/{id}', [NotificationController::class, 'followNotification'])->name('follow.notification');
Route::put('/status-baca/like-replies/{id}', [NotificationController::class, 'repliesNotification'])->name('replies.notification');
Route::put('/status-baca/like-resep/{id}', [NotificationController::class, 'likeResep'])->name('resep.like.notification');
Route::put('/status-baca/shared-feed/{id}', [NotificationController::class, 'shareVeed'])->name('share.veed.notification');
Route::put('/status-baca/profile-blocked/{id}', [NotificationController::class, 'blockedProfile'])->name('profile.blocked.notification');
Route::put('/status-baca/replies-blocked/{id}', [NotificationController::class, 'repliesBlocked'])->name('replies.blocked.notification');
Route::put('/status-baca/tambah-resep/{id}', [NotificationController::class, 'recipesNotification'])->name('resep.read.notification');
Route::put('/status-baca/blokir-resep/{id}', [NotificationController::class, 'blockedRecipes'])->name('blockedRecipes.notification');
Route::put('/status-baca/blokir-komentar/{id}', [NotificationController::class, 'blockedComent'])->name('blockedComent.notification');
Route::put('/status-baca/blokir-feed/{id}', [NotificationController::class, 'blockedFeed'])->name('blockedFeed.notification');
Route::put('/status-baca/blokir-kursus/{id}', [NotificationController::class, 'blockedKursus'])->name('blockedKursus.notification');
Route::put('/status-baca/blokir-keluhan/{id}', [NotificationController::class, 'blockedComplaint'])->name('blockedComplaint.notification');
Route::put('/status-baca/top-up/{id}', [NotificationController::class, 'top_up'])->name('topUp.notification');
Route::put('/status-baca/verifed/{id}', [NotificationController::class, 'verifed'])->name('notification.verifed');
Route::put('/status-baca/data-koki/{id}', [NotificationController::class, 'dataKoki'])->name('notification.dataKoki');
Route::put('/status-baca/penarikan/{id}', [NotificationController::class, 'penarikan'])->name('notification.penarikan');
Route::put('/status-baca/kursus/{id}', [NotificationController::class, 'kursus'])->name('notification.kursus');
Route::put('/status-baca/ulasan/{id}', [NotificationController::class, 'ulasan'])->name('notification.ulasan');
Route::patch('/status-baca/semua', [NotificationController::class, 'update_all_status'])->name('all.notifications');

// artikel
Route::post('/favorite-store/{id}', [FavoriteController::class, 'store'])->name('favorite.store');
Route::post('/favorite-feed-store/{id}', [FavoriteController::class, 'storeVeed'])->name('favorite.feed.store');
Route::post('/favorite-delete/multiple', [FavoriteController::class, 'destroyFavorite'])->name('favorite.delete.multiple');

Route::post('/keluhan-store', [ComplaintController::class, 'store'])->name('ComplaintUser.store');
Route::delete('/keluhan-delete/{id}', [ComplaintController::class, 'destroy'])->name('complaint.destroy');
// Login Register & logout

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::get('voice-note', [TestingController::class, 'voice_note'])->name('voice.note');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::post('update/profile', [KokiController::class, 'updateProfile'])->name('update.profile');
Route::post('update/password', [KokiController::class, 'updatePassword'])->name('update.password');
Route::get('delete/profile', [KokiController::class, 'deleteProfilePicture'])->name('delete.profile');

//Keluhan user
Route::post('/keluhan-store', [complaintController::class, 'store'])->name('ComplaintUser.store');
Route::get('/keluhan/by-id', [complaintController::class, 'index'])->name('ComplaintUser.index');
Route::put('/keluhan-update/{id}', [complaintController::class, 'update'])->name('ComplaintUser.update');
Route::get('/show-reply-by/{id}', [ReplyController::class, 'show'])->name('ShowReplies.show');
Route::post('/reply-store-by/{id}', [ReplyController::class, 'reply'])->name('ReplyComplaint.store');
Route::post('/replies-store/{id}', [ReplyController::class, 'replyComment'])->name('ReplyComment.store');
Route::post('/reply-replies-store/{id}/{id2}', [ReplyController::class, 'replyReplyComment'])->name('ReplyReplyComment.store');
Route::post('/comments/{id}/like', [LikeController::class, 'like'])->name('Replies.like');
Route::post('/comments/reply/{id}/like', [LikeController::class, 'likeBalasan'])->name('Replies.like.balasan');
Route::post('/resep/{id}/like', [LikeController::class, 'likeResep'])->name('Resep.like');
Route::post('/comments/{id}/unlike', [LikeController::class, 'unlike'])->name('Replies.unlike');
Route::delete('/reply-destroy/{id}', [ReplyController::class, 'destroy'])->name('ReplyDestroy.destroy');
Route::delete('/reply-comment-destroy/{id}', [ReplyController::class, 'destroyComment'])->name('replyComment.destroy');

//report
Route::post('/laporan-pengguna-store', [ReportController::class, 'store'])->name('Report.store');
Route::post('/laporan-komentar-resep-store/{id}', [ReportController::class, 'store_comment_recipes'])->name('Report.comment.recipes');
Route::post('/laporan-balasan-komentar-resep-store/{id}', [ReportController::class, 'reply_comment_recipes'])->name('Report.reply.comment.recipes');
Route::post('/laporan-resep/{id}',[ReportController::class,'storeResep'])->name('report.resep');
Route::post('/laporan-feed/{id}',[ReportController::class,'storeVeed'])->name('report.feed');
Route::post('/laporan-komentar-feed/{comment_id?}/{reply_comment_id?}/{reply_replies_comment_id?}',[ReportController::class,'store_comment_feed'])->name('report.comment.feed');
Route::post('/laporan-komentar/{id}',[ReportController::class,'storeReply'])->name('report.reply');
Route::post('/laporan-komentar-balasan/{id}',[ReportController::class,'storeReplyComment'])->name('report.reply.comment');
Route::post('/laporan-keluhan/{id}',[ReportController::class,'storeComplaint'])->name('report.complaint');
Route::post('/laporan-kursus/{id}',[ReportController::class,'storeCourse'])->name('report.course');

Route::prefix('share-content')->group(function (){
    Route::post('feed/{id}',[VeedController::class,'shareVeed'])->name('share.feed');
    Route::post('share-recipe',[ResepsController::class,'shareRecipe'])->name('share.recipe');
    Route::get('detail/feed/{id}',[VeedController::class,'detailVeed'])->name('detail.feed');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('data-koki', [AdminController::class, 'data_koki'])->name('admin.datakoki')->middleware('roleAdmin:admin_approval');
        Route::post('data-koki/{id}', [AdminController::class, 'proses_data_koki'])->name('proses.data.koki');
        Route::get('ajuan-penarikan', [AdminController::class, 'ajuan_penarikan'])->name('admin.ajuanpenarikan')->middleware('roleAdmin:admin_keuangan');
        Route::post('ajuan-penarikan/{id}', [AdminController::class, 'proses_ajuan_penarikan'])->name('proses.ajuan.penarikan');
        Route::put('/topup/categories/{id}', [TopUpController::class, 'update'])->name('update.categories');
        Route::get('complaint/all', [complaintController::class, 'index_all'])->name('Complaint.all');
        Route::get('reply-complaint', [ReplyController::class, 'index'])->name('ReplyUser.index');
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('verifed', [AdminController::class, 'verifed'])->name('admin.verifed')->middleware('roleAdmin:admin_approval');
        Route::patch('verifed/{id}/{status}', [AdminController::class, 'action_verifed'])->name('action.verified');
        Route::get('tawaran', [AdminController::class, 'tawaran'])->name('admin.tawaran')->middleware('roleAdmin:admin_keuangan');
        Route::get('kursus', [KursusController::class, 'kursus'])->name('admin.kursus')->middleware('roleAdmin:admin_approval');
        // tambah penawaran
        Route::post('upload_penawaran', [AdminController::class, 'upload_tawaran'])->name('upload.tawaran');
        // edit penawaran
        Route::post('update_penawaran/{id}', [AdminController::class, 'update_tawaran'])->name('update.tawaran');
        // hapus penawaran
        Route::delete('delete_penawaran/{id}', [AdminController::class, 'hapus_tawaran'])->name('hapus.tawaran');
        // verifikasi kursus
        Route::patch('verifikasi_kursus/{status}/{id}', [KursusController::class, "eksekusi_kursus"])->name("eksekusi.kursus");
        //report
        Route::get('laporan-pengguna', [ReportController::class, 'index'])->name('Report.index')->middleware('roleAdmin:admin_laporan');
        Route::get('keluhan', [ReportController::class, 'keluhan'])->name('Report.keluhan');
        Route::get('komentar', [ReportController::class, 'komentar'])->name('Report.komentar');
        Route::get('profil', [ReportController::class, 'profil'])->name('Report.profil');
        Route::put('content-destroy/{id}', [ReportController::class, 'block'])->name('blockContent.destroy');
        Route::put('block-resep/{id}', [ReportController::class, 'block_resep'])->name('block.resep');
        Route::put('block-profile/{id}', [ReportController::class, 'block_profile'])->name('block.profile');
        Route::put('block-user/{id}',[ReportController::class,'blockUser'])->name('block.user');
        Route::put('block-complaint/{id}', [ReportController::class, 'block_complaint'])->name('block.complaint');
        Route::put('block-kursus/{id}', [ReportController::class, 'block_kursus'])->name('block.kursus');
        Route::put('block-comment-recipe/{id}', [ReportController::class, 'block_comment_recipe'])->name('block.comment.recipe');
        Route::put('block-reply-comment-recipe/{id}', [ReportController::class, 'block_reply_comment_recipe'])->name('block.reply.comment.recipe');
        Route::put('block-feed/{id}', [ReportController::class, 'block_feed'])->name('block.feed');
        Route::put('block-reply-reply-comment-feed/{id}', [ReportController::class, 'block_reply_reply_comment_feed'])->name('block.reply.reply.comment.feed');
        Route::put('block-reply-comment-feed/{id}', [ReportController::class, 'block_reply_comment_feed'])->name('block.reply.comment.feed');
        Route::put('block-comment-feed/{id}', [ReportController::class, 'block_comment_feed'])->name('block.comment.feed');
        Route::put('block-comment-replies/{id}', [ReportController::class, 'block_komen_replies'])->name('block.komen.replies');
        Route::put('block-reply-comment-replies/{id}', [ReportController::class, 'block_reply_comment_replies'])->name('block.reply.comment.replies');
        Route::get('random-profile/{id}', [ReportController::class, 'randomName'])->name('randomName.update');
        Route::get('blocked-user', [ReportController::class, 'blocked_index'])->name('blocked.user.status')->middleware('roleAdmin:admin_laporan');
        Route::put('unblock-user/{id}', [ReportController::class, 'unblock_store'])->name('unblock.user.store');
        Route::delete('report-destroy/{id}', [ReportController::class, 'destroy'])->name('Report.destroy');
        Route::post('topup-categories',[TopUpController::class,'categories'])->name('categories.topup.store');
        Route::delete('delete-topup-categories/{id}', [TopUpController::class, 'hapus_categories'])->name('hapus.categories.topup');
         // special_days
         Route::resource('special-days', SpecialDaysController::class)->middleware('roleAdmin:admin_informasi_web');
        //  kategori makanan
         Route::resource('kategori-makanan',KategoriMakananController::class)->middleware('roleAdmin:admin_informasi_web');
        // footer
        Route::resource('footer',FooterController::class)->middleware('roleAdmin:admin_informasi_web');
    });
});


// role koki
Route::middleware(['auth', 'role:koki'],['auth','status:aktif'])->group(function () {
    Route::get('/tambah-kursus');
    Route::post('/pemasukan-koki/{chef_id}/{user_id}/{content_id}/{status}', [IncomeChefsController::class, 'pemasukan_koki'])->name('pemasukan.koki');
    Route::get('koki/index', [KokiController::class, 'index'])->name('koki.index');
    Route::prefix('/koki')->group(function () {
        Route::post('kirim-data-pribadi', [KokiController::class,'data_pribadi_chef'])->name('kirim.dataPribadiChef');
        Route::post('ajukan-penarikan', [IncomeChefsController::class, 'ajukan_penarikan'])->name('ajukan.penarikan');
        Route::resource('resep', ResepsController::class);
        Route::post('transaction',[TopUpController::class,'transaction'])->name('topup.transaction');
        Route::get('detail-transaction/{reference}',[TopUpController::class,'detailTransaction'])->name('detail.transaction');
        Route::get('payments-method-page/{price?}',[TopUpController::class,'paymentsPage'])->name('payments.page');
        Route::post('get-payment-method',[TopUpController::class,'paymentMethod'])->name('payments.method.get');
        Route::resource('kursus', KursusController::class)->middleware('auth.superUser');
        Route::get('upload-video', [KokiController::class, 'upload_video'])->name('koki.video');
        Route::get('beranda', [KokiController::class, 'beranda'])->name('koki.beranda');
        Route::get('feed', [KokiController::class, 'feed'])->name('koki.feed');
        Route::get('kursus', [KokiController::class, 'kursus'])->name('koki.kursus');
        Route::get('user/{id}', [AdminController::class, 'userContent'])->name('koki.user');
        Route::get('kursus-content/{id}', [KokiController::class, 'kursusContent'])->name('koki.content');
        // route sesi kursus
        Route::post('tambah-sesi-kursus', [KursusController::class, "tambahSesi"])->name('tambah.sesi.kursus')->middleware('auth.superUser');
        Route::post('update-sesi-kursus/{id}', [KursusController::class, "updateSesi"])->name('update.sesi.kursus')->middleware('auth.superUser');
        Route::delete('hapus-sesi-kursus/{id}', [KursusController::class, "hapusSesi"])->name('hapus.sesi.kursus')->middleware('auth.superUser');
        Route::post('tambah-detail-sesi-kursus/{id}', [KursusController::class, "tambahDetailSesi"])->name('tambah.detail.sesi.kursus')->middleware('auth.superUser');
        Route::post('update-detail-sesi-kursus/{id}', [KursusController::class, "updateDetailSesi"])->name('update.detail.sesi.kursus')->middleware('auth.superUser');
        Route::delete('hapus-detail-sesi-kursus/{id}', [KursusController::class, "hapusDetailSesi"])->name('hapus.detail.sesi.kursus')->middleware('auth.superUser');
        // end route sesi kursus
        Route::get('profilage', [KokiController::class, 'profilage'])->name('koki.profilage');
        Route::match(['post', 'get'],'income-koki',[KokiController::class,'incomeKoki'])->name('koki.income');
        Route::get('views-recipe',[KokiController::class,'viewsRecipe'])->name('koki.recipe');
        Route::get('diskusi',[KokiController::class,'jawaban_diskusi'])->name('koki.diskusi');
        Route::get('favorite',[KokiController::class,'favorite'])->name('koki.favorite');
        Route::resource('topup',TopUpController::class);
        Route::post('payment-method',[TopUpController::class,'paymentMethod'])->name('koki.payment.list');
        // Route::resource('donation',DonationController::class);
        Route::post('donation',[DonationController::class,'store'])->name('donation.store');
    });
});

// feed route
Route::post('upload-video', [KokiController::class, 'upload'])->name('upload.video')->middleware("auth");
Route::delete('/hapus_feed/{id}', [KokiController::class, "hapus_feed"])->name('hapus.feed')->middleware("auth");
Route::post("/update-feed/{id}", [KokiController::class, "updateFeed"])->name("update.feed")->middleware("auth");
Route::get("/Notification/Navbar", [FavoriteController::class, "index"])->name("NotificationNavbar");

// like dan favorite pada artikel resep
Route::post('/komentar-resep/{pengirim}/{penerima}/{recipe}/{comment?}', [KomentarResepController::class, 'toComment'])->name('komentar.resep')->middleware("auth");
Route::post('/balasan-komentar-resep/{id}/{user}', [KomentarResepController::class, 'reply_comment'])->name('balasan.komentar.resep')->middleware("auth");
Route::post('/balasan-balasan-komentar-resep/{id}/{user}', [KomentarResepController::class, 'reply_reply_comment'])->name('balasan.balasan.komentar.resep')->middleware("auth");
Route::post('/koki/sukai/{id}', [LikeCommentController::class, 'like_comment_recipe'])->name('like.comment.recipe')->middleware('auth');
Route::post('/like/komentar/{user}/{resep}/{comment}', [LikeCommentController::class, 'like_reply_comment_recipe'])->name('like.reply.comment.recipe')->middleware("auth");
Route::post('/koki/sukai/balasan/{id}', [LikeCommentController::class, 'like_reply_comment'])->name('likeReply.comment.recipe')->middleware('auth');
Route::delete('/hapus/komentar-resep/{id}', [KomentarResepController::class, 'delete_comment'])->name('delete.comment')->middleware(['auth']);
Route::delete('/hapus/komentar-resep-reply/{id}', [KomentarResepController::class, 'delete_reply_comment'])->name('delete.reply.comment')->middleware('auth');

// like dan komentar pada veed
Route::post("/like/veed/{user_id}/{veed_id}", [VeedController::class, "sukai_veed"])->name("sukai.veed");
Route::post("/komentar-veed/{pengirim_id}/{penerima_id}/{veed_id}", [VeedController::class, 'komentar_veed'])->name('komentar.veed');
Route::post("/like/{user_id}/{komentar_veed_id}/{veed_id}", [VeedController::class, 'like_komentar_veed'])->name('like.komentar.veed');
Route::post("/balas/komentar/{user_id}/{comment_id}/{veed_id}", [VeedController::class, 'balas_komentar_veed'])->name('balas.komentar.veed');
Route::post("/sukai/balasan/komentar/{user_id}/{reply_comment_id}/{veed_id}", [VeedController::class, 'sukai_balasan_komentar_veed'])->name('sukai.balasan.komentar.veed');
Route::post("/sukai/reply_balasan/komentar/{user_id}/{reply_replyComment_id}/{feed_id}", [VeedController::class, 'like_replies_reply'])->name('sukai.reply_balasan.komentar');
Route::delete("/hapus_komentar_feed/{id}", [VeedController::class, "hapus_komentar_feed"])->name('hapus.komentar.feed');
Route::delete("/hapus_balasan_komentar_feed/{id}", [VeedController::class, "hapus_balasan_komentar_feed"])->name('hapus.balasan.komentar.feed');
Route::delete("/delete-replies-comment-feed/{id}", [VeedController::class, "delete_replies_reply_feed"])->name('delete.replies.reply.feed');
Route::post("/balas_komentar_balasan_feed/{pemilik_id}/{comment_id}/{parent_id?}", [VeedController::class, 'balasRepliesCommentsFeeds'])->name('balas.replies.comments.feeds')->middleware("auth");
// route lihat feed premium
Route::get('/lihat_feed_premium/{video}', [VeedController::class, "lihat_feed_premium"])->name('lihat.feed.premium');
//followers
Route::post('/store-followers/{id}', [FollowersController::class, 'store'])->name('Followers.store');

// testing payment
Route::get('/testing-payment/{id}/{price}/{name_product}', [PaymentController::class, 'channel_pembayaran'])->name('testing.payment')->middleware(['auth', 'role:koki']);
Route::post('/request-pembayaran', [PaymentController::class, 'dapatkan_transaksi'])->name('request.pembayaran')->middleware(['auth', 'role:koki']);
Route::get('/detail-pembayaran/{reference}', [PaymentController::class, 'detail_pembayaran'])->name('detail.pembayaran')->middleware('auth', 'role:koki');
Route::get('/daftar-transaksi', [PaymentController::class, 'daftar_transaksi'])->name('daftar.transaksi');

Route::post('/callback', [TripayCallbackController::class, "handle"]);

Route::post('/callback/top-up',[TripayCallbackController::class,'TopUpHandle']);
// testing leaflet
Route::get("/leafletjs", function () {
    return view('testing.leaflet');
});

// route untuk ulasan dan rating pada kursus
Route::post('/ulasan-rating-kursus/{course}/{chef}/{user}', [UlasanRatingController::class, 'store'])->name('ulasan-rating-kursus.store');
Route::post('/balas-ulasan/{course}/{user}/{parent}', [UlasanRatingController::class, "storeBalasan"])->name("balas.ulasan");
Route::delete('/hapus-ulasan/{id}', [UlasanRatingController::class, "destroy"])->name("delete.ulasan");
Route::put('/update-ulasan/{id}', [UlasanRatingController::class, "update"])->name("update.ulasan");
// route favorite atau simpan kursus
Route::post('/favorite/kursus/{chef}/{course}', [KursusController::class, 'favoriteKursus'])->name('favorite.kursus');
// route reply reply comment di resep dan diskusi
Route::post('/reply-reply-comment', [KokiController::class, 'replyReplyComment'])->name('reply.reply.comment');
