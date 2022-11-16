<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    protected $fillable = [
        'medium'
    ];

    public function teaching_materials() {
        return $this->hasMany(TeachingMaterial::class);
    }
}
