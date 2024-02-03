<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygon extends Model
{
    protected $table = 'polygon';
    use HasFactory;

    protected $fillable = [
        'id',
        'gym_id',
        'latitude_polygon',
        'longitude_polygon',
    ];
    // public function gym() {
    //     return $this->belongsTo(Gym::class);
    // }
}

