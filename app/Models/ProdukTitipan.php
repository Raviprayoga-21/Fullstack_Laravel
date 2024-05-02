<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTitipan extends Model
{
    use HasFactory;

    protected $table = 'produktitipan';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = 
    [
        'nama_produk',
        'nama_supplier',
        'harga_beli',
        'harga_jual',
        'stok',
        'keterangan'
    ];
}
