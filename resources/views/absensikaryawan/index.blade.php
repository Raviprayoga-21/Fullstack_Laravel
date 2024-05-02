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
                <h3 class="card-title">Absensi Karyawan</h3>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert" id="success-alert">
                    {{ session('success' )}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <i class="fas fa-plus"></i> Tambah Karyawan
                </button>
                
                <a href="{{ route('export-absensikaryawan') }}" class="btn btn-success" style="margin-left: 5px;">
                    <i class="fas fa-file-excel"></i> Export
                </a>
                
                <a href="#" class="btn btn-warning" style="margin-left: 5px;" data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-excel"></i> Import
                </a>
                @include('absensikaryawan.data')
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

    @include('absensikaryawan.form')
    
    @include('absensikaryawan.import')
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
        $('#tbl-member').DataTable(); // Corrected the DataTable initialization
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
        const btn = $(e.relatedTarget);
        const mode = btn.data('mode');
        console.log('edit');
        const nama_karyawan = btn.data('nama_karyawan');
        const tanggal_masuk  = btn.data('tanggal_masuk ')
        const waktu_masuk = btn.data('waktu_masuk');
        const statuss = btn.data('statuss')
        const waktu_keluar = btn.data('waktu_keluar');
        const id = btn.data('id');
        const modal = $(this);
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Absensi');
            modal.find('#nama_karyawan').val(nama_karyawan); 
            modal.find('#tanggal_masuk').val(tanggal_masuk); 
            modal.find('#waktu_masuk').val(waktu_masuk);
            modal.find('#statuss').val(statuss);
            modal.find('#waktu_keluar').val(waktu_keluar);
            modal.find('.modal-body form').attr('action', '{{ url("absensikaryawan") }}/' + id);
            modal.find('#method').html('@method("PUT")');
        } else {
            modal.find('.modal-title').text('Input Data member');
            modal.find('#nama_karyawan').val(''); 
            modal.find('#tanggal_masuk').val(''); 
            modal.find('#waktu_masuk').val(''); 
            modal.find('#statuss').val(''); 
            modal.find('#waktu_keluar').val(''); 
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{ url("absensikaryawan") }}');
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