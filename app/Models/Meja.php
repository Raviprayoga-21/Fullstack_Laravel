<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = 
    [
        'nomor_meja',
        'kapasitas',
        'status',
    ];
}
