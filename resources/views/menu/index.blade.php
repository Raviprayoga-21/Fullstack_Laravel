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
          <h3 class="card-title">Menu</h3>
        </div>
          <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success" role="alert" id="success-alert">
              {{ session('success' )}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
          @endif
          
          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
              <i class="fas fa-plus"></i>
               Tambah Menu
            </button>
            @include('menu.data')
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    </section>
    <!-- /.content -->
    @include('menu.form')
@endsection

@push('scripts')
<script>
 $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


    $('#success-alert').fadeTo(500, 500).slideUp(500, function() {
        $('#success-alert').slideUp(500);
    });

    $('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
        $('#error-alert').slideUp(500);
    });

    $(function() {
        $('#tbl-menu').DataTable(); // Corrected the DataTable initialization
    });

    // dialog hapus Data
    $('.btn-delete').on('click', function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
        });
    });

    $('#formModal').on('show.bs.modal', function(e) {
      console.log('menu')
        const btn = $(e.relatedTarget);
        const mode = btn.data('mode');
        const nama_menu = btn.data('nama_menu');
        const jenis_id = btn.data('jenis_id');
        const harga = btn.data('harga');
        const stok = btn.data('stok');
        const old_image = btn.data('image');
        const deskripsi = btn.data('deskripsi');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data menu');
            modal.find('#nama_menu').val(nama_menu); 
            modal.find('#jenis_id').val(jenis_id); 
            modal.find('#harga').val(harga); 
            modal.find('#stok').val(stok); 
            modal.find('#old_image').val(image); 
            modal.find('#deskripsi').val(deskripsi);
            modal.find('.img-preview').attr('src','{{ asset("storage/menu-image")}}/' + image );
            modal.find('.modal-body form').attr('action', '{{ url("menu") }}/' + id);
            modal.find('#method').html('@method("PATCH")');
        } else {
            modal.find('.modal-title').text('Input Data menu');
            modal.find('#nama_menu').val(''); 
            modal.find('#jenis_id').val('');
            modal.find('#harga').val('');
            modal.find('#stok').val('');
            modal.find('#old_image').val('');
            modal.find('#deskripsi').val('');
            modal.find('.img-preview').attr('src', '');
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("menu") }}');
        }
    });


    //trigger action delete
    $('.delete-data').click(function(e){
      e.preventDefault()
      const data = $(this).closest('tr').find('td:eq(1)').text()
      Swal.fire({
        title: 'Data akan dihapus',
        text: `Apakah yakin data tersebut akan dihapus?`,
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Ya',
        denyButonText: 'Tidak',
        focusConfirm: false
      })
      .then((result) => {
        if(result.isConfirmed) $(e.target).closest('form').submit()
        else swal.close()
      })
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const ofReader = new FileReader();
      ofReader.readAsDataURL(image.files[0]);

      ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

    
</script>
@endpush