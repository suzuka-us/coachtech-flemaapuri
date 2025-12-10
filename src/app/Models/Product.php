<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // カテゴリー（1商品は1カテゴリに所属）
    //public function category()
    // {
    // return $this->belongsTo(Category::class);
    
    
    
    // カテゴリー（1商品は複数カテゴリを持つ）
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }



    // コメント（1商品は複数コメントを持つ）
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // いいね（1商品は複数いいねを持つ）
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
}
