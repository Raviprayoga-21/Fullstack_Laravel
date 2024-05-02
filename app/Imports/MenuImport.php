<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;

class MenuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Menu([
            'id' => $row[0],
            'jenis_id' => $row[1], // Menggunakan nama kolom 'nama_produk'
            'nama_menu' => $row[2], // Menggunakan nama kolom 'nama_produk'
            'harga' => $row[3], // Menggunakan nama kolom 'nama_produk'
            'image' => $row[4], // Menggunakan nama kolom 'nama_produk'
            'deskripsi' => $row[5], // Menggunakan nama kolom 'nama_produk'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
