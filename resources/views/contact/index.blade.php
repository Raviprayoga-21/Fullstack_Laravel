@extends('template.layout2')

@section('content')  
<div class="content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact us</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Contact us</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default bo x -->
    <div class="card">
      <div class="card-body row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
          <div class="">
            <img src="{{ asset('adminlte3') }}/dist/img/cafe.jpeg" alt="AdminLTE Logo" style="max-width: 600px; max-height: 600px; border-radius: 10px; margin-bottom: 10px;">
            <h2>Caffe<strong>Ravi</strong></h2>
            <p class="lead mb-5">Jl. Siliwangi No.1, Cianjur <br>
              Phone: 62+ 485792502
            </p>
          </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.537442611398!2d107.13334892747439!3d-6.8259700596560755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68525760aaa209%3A0x4a4020b1836d1a1d!2sSMK%20Negeri%201%20Cianjur!5e0!3m2!1sid!2sid!4v1713932402593!5m2!1sid!2sid" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="col-7">
          <div class="form-group">
            <label for="inputName">Nama</label>
            <input type="text" id="inputName" class="form-control" />
          </div>
          <div class="form-group">
            <label for="inputEmail">E-Mail</label>
            <input type="email" id="inputEmail" class="form-control" />
          </div>
          <div class="form-group">
            <label for="inputSubject">Alamat</label>
            <input type="text" id="inputSubject" class="form-control" />
          </div>
          <div class="form-group">
            <label for="inputMessage">Pesan</label>
            <textarea id="inputMessage" class="form-control" rows="4"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Kirim">
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>  
@endsection