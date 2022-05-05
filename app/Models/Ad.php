<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Models;

class Ad extends Models
{
    use HasFactory;

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function model()
    {
        return $this->hasOne(Model::class, 'id', 'model_id');
    }

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'id', 'manufacturer_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite()
    {
        return $this->belongsTo(FavoriteAd::class);
    }
}
