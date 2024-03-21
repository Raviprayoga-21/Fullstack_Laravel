<?php

namespace App\Imports;

use App\Models\ProdukTitipan;
use Maatwebsite\Excel\Concerns\ToModel;

class ProdukTitipanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProdukTitipan([
            'nama_produk' => $row[0], // Menggunakan nama kolom 'nama_produk'
            'nama_supplier' => $row[1], // Menggunakan nama kolom 'nama_supplier'
            'harga_beli' => $row[2], // Menggunakan nama kolom 'harga_beli'
            'harga_jual' => $row[3], // Menggunakan nama kolom 'harga_jual'
            'stok' => $row[4], // Menggunakan nama kolom 'stok'
            'keterangan' => $row[5], // Menggunakan nama kolom 'keterangan'
        ]);
    }
    

    public function headingRow(): int
    {
        return 3;
    }
}
