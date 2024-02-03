<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = 'gym_locator';
    use HasFactory;

    protected $fillable = [
        'nama_gym',
        'foto_gym',
        'alamat',
        'jam_operasional',
        'latitude',
        'longitude',
        'deskripsi_gym',
        'nomor_telepon',
        'fasilitas_gym',
        'harga_member',
        'harga_visit',
    ];
}
