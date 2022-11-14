<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'medium_id', 'category_id'
    ];

    public function medium() {
        return $this->belongsTo(Medium::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
