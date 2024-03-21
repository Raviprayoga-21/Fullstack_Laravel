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
                <h3 class="card-title">Produk Titipan</h3>
                <a href="{{ route('export-produk') }}" class="btn btn-success" style="margin-left: 8px;">
                    <i class="fas fa-file-excel" style="margin-left: 1px; margin-right: 1px;"></i>Export Excel
                </a>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-file-excel" style="margin-left: 1px; margin-right: 1px;"></i>Import Excel
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert" id="success-alert">
                        {{ session('success') }}
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
                    Tambah Produk Titipan
                </button>
                @include('produktitipan.data')
            </div>
            <!-- /.card-body -->
        </div>
        </button>

        <!-- Modal import -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Produk Titipan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('import-produk')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis">File Excel</label>
                                    <input type="file" name="import" id="import">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
    @include('produktitipan.form')
@endsection

@push('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
            $('#tbl-produktitipan').DataTable(); // Corrected the DataTable initialization
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
            const nama_produk = btn.data('nama_produk');
            const nama_supplier = btn.data('nama_supplier')
            const harga_beli = btn.data('harga_beli');
            const harga_jual = btn.data('harga_jual')
            const stok = btn.data('stok');
            const keterangan = btn.data('keterangan');
            const id = btn.data('id');
            const modal = $(this);
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Produk Titipan');
                modal.find('#nama_produk').val(nama_produk);
                modal.find('#nama_supplier').val(nama_supplier);
                modal.find('#harga_beli').val(harga_beli);
                modal.find('#harga_jual').val(harga_jual);
                modal.find('#stok').val(stok);
                modal.find('#keterangan').val(keterangan);
                modal.find('.modal-body form').attr('action', '{{ url('produktitipan') }}/' + id);
                modal.find('#method').html('@method('PUT')');
            } else {
                modal.find('.modal-title').text('Input Data Produk Titipan');
                modal.find('#nama_produk').val('');
                modal.find('#nama_supplier').val('');
                modal.find('#harga_beli').val('');
                modal.find('#harga_jual').val('');
                modal.find('#stok').val('');
                modal.find('#keterangan').val('');
                modal.find('#method').html('');
                modal.find('.modal-body form').attr('action', '{{ url('produktitipan') }}');
            }
        });


        //trigger action delete
        $('.delete-data').click(function(e) {
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
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
        })
    </script>
@endpush
