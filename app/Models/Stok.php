<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = 
    [
        'menu_id',
        'jumlah'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
