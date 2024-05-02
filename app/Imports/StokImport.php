<?php

namespace App\Imports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;

class StokImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stok([
            'id' => $row[0],
            'menu_id' => $row[1], // Menggunakan nama kolom 'nama_produk'
            'nama_jenis' => $row[2], // Menggunakan nama kolom 'nama_produk'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
