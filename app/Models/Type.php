<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function ads()
    {
        return $this->hasMany(AD::CLASS, 'type_id', 'id');
    }
}
