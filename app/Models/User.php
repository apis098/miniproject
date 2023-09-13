<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'role',
        'foto', 
        'isSuperUser'
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
    public function resep() {
        return $this->hasMany(reseps::class);
    }
    public function followers()
    {
        return $this->hasMany(followers::class);
    }
    public function comment_recipe() 
    {
        return $this->belongsToMany(reseps::class, "comment_recipes", "users_id", "recipes_id")->withPivot("comment");
    }
    public function like_comment_recipe()
    {
        return $this->hasMany(like_comment_recipes::class, "users_id");
    }
    public function reply_comment_recipe() {
        return $this->hasMany(replyCommentRecipe::class);
    }
    public function like_reply_comment_recipe() {
        return $this->hasMany(LikeReplyCommentRecipes::class, "users_id");
    }
    public function tag_comment() {
        return $this->hasMany(tagReplyComments::class);
    }
    public function upload_video() {
        return $this->hasMany(upload_video::class);
    }
    public function comment_veed() {
        return $this->hasMany(comment_veed::class);
    }
    public function reply_comment_veed() {
        return $this->hasMany(reply_comment_veed::class);
    }
    public function like_veed() {
        return $this->hasMany(like_veed::class);
    }
    public function like_comment_veed() {
        return $this->hasMany(like_comment_veed::class);
    }
    public function like_reply_comment_veed() {
        return $this->hasMany(like_reply_comment_veed::class);
    }

}
