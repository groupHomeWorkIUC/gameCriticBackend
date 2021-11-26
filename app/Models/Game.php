<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function images(){
            return $this->belongsToMany(Image::class, 'image_game');
    }
    public function platforms(){
        return $this->hasOne(Platform::class, 'game_id');
    }
    public function company(){
        return $this->hasOne(Company::class, 'id','company_id');
    }
}
