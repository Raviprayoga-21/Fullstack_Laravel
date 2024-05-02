<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = 
    [
        'nama_kategori'
    ];
}
