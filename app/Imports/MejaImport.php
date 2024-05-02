<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;

class MejaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Meja([
            'id' => $row[0],
            'nomor_meja' => $row[1], // Menggunakan nama kolom 'nama_produk'
            'kapasitas' => $row[2], // Menggunakan nama kolom 'nama_produk'
            'status' => $row[3], // Menggunakan nama kolom 'nama_produk'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
