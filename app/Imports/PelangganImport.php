<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;

class PelangganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama_pelanggan' => $row[0], // Menggunakan nama kolom 'nama_produk'
            'email' => $row[1], // Menggunakan nama kolom 'nama_produk'
            'nomor_telepon' => $row[2], // Menggunakan nama kolom 'nama_produk'
            'alamat' => $row[3], // Menggunakan nama kolom 'nama_produk'
            'jenis_kelamin' => $row[4], // Menggunakan nama kolom 'nama_produk'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
