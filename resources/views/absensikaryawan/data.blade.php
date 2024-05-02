<!-- Tabel Absensi Karyawan -->
<div class="mt-4">
    <table id="tbl-absensikaryawan" class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Masuk</th>
                <th>Waktu Masuk</th>
                <th>Status</th>
                <th>Waktu Kerja Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensikaryawan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_karyawan }}</td>
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->waktu_masuk }}</td>
                <td>
                    <select class="form-control status-select" data-id="{{ $p->id }}">
                        <option value="masuk" {{ $p->statuss == 'masuk' ? 'selected' : '' }}>Masuk</option>
                        <option value="sakit" {{ $p->statuss == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="cuti" {{ $p->statuss == 'cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="izin" {{ $p->statuss == 'izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                </td>
                <td>{{ $p->waktu_keluar }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" 
                    data-id="{{ $p->id }}" 
                    data-nama_karyawan="{{ $p->nama_karyawan }}" 
                    data-tanggal_masuk="{{ $p->tanggal_masuk }}" 
                    data-waktu_masuk="{{ $p->waktu_masuk }}" 
                    data-statuss="{{ $p->statuss }}" 
                    data-waktu_keluar="{{ $p->waktu_keluar }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('absensikaryawan/'.$p->id) }}" style="display:inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete-data" type="submit" style="color:red" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <button class="btn btn-primary btn-finish" data-id="{{ $p->id }}">Selesai</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Mengatur perubahan combo box
        $('.status-select').change(function() {
            var id = $(this).data('id');
            var status = $(this).val();
            if (status == 'sakit' || status == 'cuti') {
                var waktuSelesai = '00:00:00';
                // Kirim data ke server untuk pembaruan
                $.ajax({
                    url: '/absensikaryawan/update-waktu-selesai/' + id,
                    type: 'POST',
                    data: {
                        waktu_selesai: waktuSelesai
                    },
                    success: function(response) {
                        // Perbarui tampilan tabel jika perlu
                        console.log('Waktu selesai diubah menjadi ' + waktuSelesai);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        // Menambahkan tombol "Selesai"
        $('.btn-finish').click(function() {
            var id = $(this).data('id');
            var waktuKeluar = new Date().toLocaleTimeString();
            // Kirim data ke server untuk pembaruan
            $.ajax({
                url: '/absensikaryawan/update-waktu-keluar/' + id,
                type: 'POST',
                data: {
                    waktu_keluar: waktuKeluar
                },
                success: function(response) {
                    // Perbarui tampilan tabel jika perlu
                    console.log('Waktu keluar diubah menjadi ' + waktuKeluar);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush