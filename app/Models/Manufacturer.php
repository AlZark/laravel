<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function ads()
    {
        return $this->hasMany(AD::CLASS, 'manufacturer_id', 'id');
    }

    public function models(){
        return $this->hasMany(Model::class);
    }
}
