<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class reseps extends Model
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
        return $this->hasMany(bahan_reseps::class, 'resep_id');
    }
    public function langkah()
    {
        return $this->hasMany(langkah_reseps::class, 'resep_id');
    }
    public function alat()
    {
        return $this->hasMany(toolsCooks::class, 'recipes_id');
    }
    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }
    public function likes()
    {
        return $this->hasMany(likes::class, 'resep_id');
    }
    public function favorite()
    {
        return $this->hasMany(favorite::class, 'resep_id');
    }
    public function kategori_resep()
    {
        return $this->belongsToMany(kategori_makanan::class, "kategori_reseps", "reseps_id", "kategori_reseps_id");
    }
    public function hari_resep()
    {
        return $this->belongsToMany(special_days::class, "hari_reseps", "reseps_id", "hari_khusus_id");
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
        return $this->hasMany(comment_recipes::class,'recipes_id');
    }
    public function comment_count()
    {
        $comment_count = comment_recipes::where('recipes_id',$this->id)->count();
        $data_comment = comment_recipes::where('recipes_id',$this->id)->first();
        $reply_comment_count = 0 ;
        if($data_comment != null && $data_comment->reply_comment_recipe->count() > 0)
        {
            $reply_comment_count = $data_comment->reply_comment_recipe->count();
        }
        return $comment_count + $reply_comment_count;
    }
    public function like_comment_recipe() {
        return $this->hasMany(like_comment_recipes::class);
    }
    public function reply_comment_recipe() {
        return $this->hasMany(replyCommentRecipe::class, "recipe_id");
    }
    public function like_reply_comment_recipe() {
        return $this->belongsTo(LikeReplyCommentRecipes::class, "recipe_id");
    }
    public function tag_comment() {
        return $this->hasMany(tagReplyComments::class);
    }
    public function income_chefs()
    {
        return $this->hasMany(income_chefs::class, "resep_id");
    }
    public function incomes()
    {
        if(Auth::check()){
            return income_chefs::where('resep_id',$this->id)->where('chef_id',auth()->user()->id)->sum('pemasukan');
        }else{
            return false;
        }
        
    }
}
