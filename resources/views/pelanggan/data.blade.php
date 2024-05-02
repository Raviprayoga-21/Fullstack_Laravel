<div class="mt-4">
    <table id="tbl-pelanggan" class="table table-hover">
        <thead style="background-color: #1966e3; color: white; font-weight: bold;"> <!-- Mengubah warna latar menjadi biru cerah -->
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $p )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->nomor_telepon }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>
                    <button class='btn' type="butto n" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" 
                    data-id="{{ $p->id }}" 
                    data-nama_pelanggan="{{ $p->nama_pelanggan }}" 
                    data-email="{{ $p->email }}" 
                    data-nomor_telepon="{{ $p->nomor_telepon }}" 
                    data-alamat="{{ $p->alamat }}" 
                    data-jenis_kelamin="{{ $p->jenis_kelamin }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('pelanggan/'.$p->id) }}" style="display:inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete-data" type="submit" style="color:red" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
