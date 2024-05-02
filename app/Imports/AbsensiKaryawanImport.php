<?php

namespace App\Imports;

use App\Models\AbsensiKaryawan;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiKaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AbsensiKaryawan([
            'nama_karyawan' => $row[0], // Menggunakan nama kolom 'nama_produk'
            'tanggal_masuk' => $row[1], // Menggunakan nama kolom 'nama_supplier'
            'waktu_masuk' => $row[2], // Menggunakan nama kolom 'harga_beli'
            'statuss' => $row[3], // Menggunakan nama kolom 'harga_jual'
            'waktu_keluar' => $row[4], // Menggunakan nama kolom 'stok'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
