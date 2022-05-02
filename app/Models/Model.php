<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model AS Models;

class Model extends Models
{
    use HasFactory;

    public function ads()
    {
        return $this->hasMany(AD::CLASS, 'model_id', 'id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }




}
