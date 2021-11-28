<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function images(){
        return $this->belongsToMany(Image::class, 'image_news');
    }

    public function comments(){
        return $this->belongsToMany(Comment::class, 'comment_news');
    }

    public function reactions(){
        return $this->hasOne(NewsReaction::class, 'news_id','id');
    }
}
