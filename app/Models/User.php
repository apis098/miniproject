<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'followers',
        'password',
        'biodata',
        'role',
        'saldo',
        'saldo_pemasukan',
        'foto',
        'isSuperUser',
        'status_langganan',
        'awal_langganan',
        'akhir_langganan',
        'level_koki',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function Token() {
        return $this->hasMany(Tokens::class, 'user_id');
    }
    public function notification_verifed() {
        return $this->hasMany(Notifications::class, 'verifed_id');
    }
    public function penarikan() {
        return $this->hasMany(Penarikans::class, "chef_id");
    }
    public function data_pribadi_chefs()
    {
        return $this->hasMany(DataPribadiKoki::class, "chef_id");
    }
    public function chefTeacher() {
        return $this->hasMany(UlasanKursus::class, 'chef_teacher_id');
    }
    public function isFavoriteCourse($course) {
        return Favorite::where('kursus_id', $course)->where('user_id_from', $this->id)->exists();
    }
    public function resep() {
        return $this->hasMany(Reseps::class);
    }
    public function followers()
    {
        return $this->hasMany(Followers::class);
    }
    public function comment_recipe()
    {
        return $this->belongsToMany(Reseps::class, "comment_recipes", "users_id", "recipes_id")->withPivot("comment");
    }
    public function like_comment_recipe()
    {
        return $this->hasMany(LikeCommentRecips::class, "users_id");
    }
    public function reply_comment_recipe() {
        return $this->hasMany(ReplyCommentRecipe::class);
    }
    public function like_reply_comment_recipe() {
        return $this->hasMany(LikeReplyCommentRecipes::class, "users_id");
    }
    public function tag_comment() {
        return $this->hasMany(TagReplayComments::class);
    }
    public function upload_video() {
        return $this->hasMany(UploadVideo::class);
    }
    public function comment_veed() {
        return $this->hasMany(CommentFeed::class);
    }
    public function reply_comment_veed() {
        return $this->hasMany(ReplyCommentFeed::class);
    }
    public function like_veed() {
        return $this->hasMany(LikeFeed::class);
    }
    public function like_comment_veed() {
        return $this->hasMany(LikeCommentFeed::class);
    }
    public function like_reply_comment_veed() {
        return $this->hasMany(LikeReplyCommentFeed::class);
    }
    public function user_premiums() {
        return $this->hasMany(HistoryPremium::class, 'users_id');
    }
    public function kursus() {
        return $this->hasMany(Kursus::class, "users_id");
    }
    public function pengirim_balasanKomentarFeed()
    {
        return $this->hasMany(BalasReplyCommentfeeds::class, "pengirim_reply_comment_id");
    }
    public function pemilik_balasanKomentarFeed()
    {
        return $this->hasMany(BalasReplyCommentfeeds::class, "pemilik_reply_comment_id");
    }
    public function like_balas_reply_comment_feed()
    {
        return $this->hasMany(LikeBalasReplyCommentFeeds::class, "user_id");
    }
    public function parent_balas_replies_comment()
    {
        return $this->hasMany(BalasReplyCommentfeeds::class, "parent_id");
    }
    public function chef_transaksi_kursus() {
        return $this->hasMany(TransaksiKursus::class, "chef_id");
    }
    public function user_transaksi_kursus() {
        return $this->hasMany(TransaksiKursus::class, "user_id");
    }
    public function chef_ulasan_kursus() {
        return $this->hasMany(UlasanKursus::class, "chef_id");
    }
    public function user_ulasan_kursus() {
        return $this->hasMany(User::class, "user_id");
    }
}
