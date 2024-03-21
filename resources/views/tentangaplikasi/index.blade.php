@extends('template.layout')
@push('styles')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"></div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tentang Aplikasi</h3>
        </div>
          <div class="card-body">
            Aplikasi yang saya buat adalah aplikasi cafe, dapat menginputkan, menghapus, merubah, 
            maupun menambahkan data sesuai dengan keinginan / kebutuhan yang sesuai dengan sebuah
            cafe yang sedang berjalan.Terdapat berbagai macam tabel diantaranya: <br>
            1. Tabel Member<br>
            2. Tabel Jenis<br>
            3. Tabel Menu<br>
            4. Tabel Stok<br>
            5. Tabel Pelanggan<br>
            6. Tabel Meja<br>
            7. Tabel Pemesanan<br>
            8. Tabel Produk Titipan<br>

        </div>
          <div class="card-header">   
          <h3 class="card-title">Sejarah Aplikasi</h3>
          </div>
        <div class="card-body">
            Aplikasi ini dibuat saat awal tahun baru, dimana aplikasi ini berawal dari penginstalan laravel di cmd, lalu lanjut ke vs code.<br>
            Sampai sekarang, aplikasi ini memuat banyak perubahan dan penambahan komponen tabel-tabel yang banyak, juga dengan fungsinya yang<br>
            berjalan dengan lancar walaupun masih banyak error yang harus dibenahi. Dengan tema aplikasi yang sesuai yaitu tentang project cafe,<br>
            maka ditambahkan lah tabel menu agar mempermudah proses pemesanan pelanggan lewat aplikasi, juga dilengkapi dengan tabel tabel yang lainnya.
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection