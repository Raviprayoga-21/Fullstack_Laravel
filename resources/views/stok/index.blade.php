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
          <h3 class="card-title">Stok</h3>
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
               Tambah Stok
            </button>
            <a href="{{ route('export-stok') }}" class="btn btn-success" style="margin-left: 5px;">
              <i class="fas fa-file-excel"></i> Export
          </a>
          
          <a href="#" class="btn btn-warning" style="margin-left: 5px;" data-toggle="modal" data-target="#formImport">
              <i class="fas fa-file-excel"></i> Import
          </a>
            @include('stok.data')
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    @include('stok.form')
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
        $('#tbl-stok').DataTable(); // Corrected the DataTable initialization
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
      console.log('edit');
        const btn = $(e.relatedTarget);
        const mode = btn.data('mode');
        const menu_id = btn.data('menu_id');
        const jumlah = btn.data('jumlah');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Stok');
            modal.find('#menu_id').val(menu_id);
            modal.find('#jumlah').val(jumlah);
            modal.find('.modal-body form').attr('action', '{{ url("stok") }}/' + id);
            modal.find('#method').html('@method("PATCH")');
        } else {
            modal.find('.modal-title').text('Input Data Stok');
            modal.find('#menu_id').val('');
            modal.find('#jumlah').val('');
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("stok") }}');
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
</script>
@endpush