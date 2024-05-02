<?php

namespace App\Imports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategori([
            'id' => $row[0],
            'nama_kategori' => $row[1], // Menggunakan nama kolom 'nama_produk'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
