<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    public function teaching_material() {
        return $this->hasMany(TeachingMaterial::class);
    }
}
