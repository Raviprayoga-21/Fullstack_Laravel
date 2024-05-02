<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = 
    [
        'nama_pelanggan',
        'email',
        'nomor_telepon',
        'alamat',
        'jenis_kelamin'
    ];
}
