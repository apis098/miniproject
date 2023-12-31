<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reseps extends Model
{
    use HasFactory;
    protected $table = 'reseps';
    protected $fillable = [
        'user_id',
        'nama_resep',
        'foto_resep',
        'deskripsi_resep',
        'hari_khusus',
        'porsi_orang',
        'lama_memasak',
        'pengeluaran_memasak',
        'isPremium'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bahan()
    {
        return $this->hasMany(BahanReseps::class, 'resep_id');
    }
    public function langkah()
    {
        return $this->hasMany(LangkahResep::class, 'resep_id');
    }
    public function alat()
    {
        return $this->hasMany(ToolsCooks::class, 'recipes_id');
    }
    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
    public function likes()
    {
        return $this->hasMany(Likes::class, 'resep_id');
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'resep_id');
    }
    public function kategori_resep()
    {
        return $this->belongsToMany(KategoriMakanan::class, "kategori_reseps", "reseps_id", "kategori_reseps_id");
    }
    public function hari_resep()
    {
        return $this->belongsToMany(SpecialDays::class, "hari_reseps", "reseps_id", "hari_khusus_id");
    }
    public function comment_user()
    {
        return $this->belongsToMany(User::class, "comment_recipes", "recipes_id", "users_id")
        ->withPivot("comment")
        ->withPivot("id")
        ->withTimestamps();
    }
    public function comment_recipes()
    {
        return $this->hasMany(CommentResipes::class,'recipes_id');
    }
    public function comment_count()
    {
        $comment_count = CommentResipes::where('recipes_id',$this->id)->count();
        $data_comment = CommentResipes::where('recipes_id',$this->id)->first();
        $reply_comment_count = 0 ;
        if($data_comment != null && $data_comment->reply_comment_recipe->count() > 0)
        {
            $reply_comment_count = $data_comment->reply_comment_recipe->count();
        }
        return $comment_count + $reply_comment_count;
    }
    public function like_comment_recipe() {
        return $this->hasMany(LikeCommentRecips::class);
    }
    public function reply_comment_recipe() {
        return $this->hasMany(ReplyCommentRecipe::class, "recipe_id");
    }
    public function like_reply_comment_recipe() {
        return $this->belongsTo(LikeReplyCommentRecipes::class, "recipe_id");
    }
    public function tag_comment() {
        return $this->hasMany(TagReplayComments::class);
    }
    public function income_chefs()
    {
        return $this->hasMany(IncomeChefs::class, "resep_id");
    }
    public function incomes()
    {
        if(Auth::check()){
            return IncomeChefs::where('resep_id',$this->id)->where('chef_id',auth()->user()->id)->sum('pemasukan');
        }else{
            return false;
        }

    }
    public function share_count()
    {
        return Share::where('resep_id',$this->id)->count();
    }
    public function share_resep()
    {
        return $this->hasMany(Share::class, "resep_id");
    }
}
