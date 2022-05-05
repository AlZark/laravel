<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAd extends Model
{
    use HasFactory;

    public function ad()
    {
        return $this->hasOne(Ad::class, 'ad_id', 'id');
    }

}
