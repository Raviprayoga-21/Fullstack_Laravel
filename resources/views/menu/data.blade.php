<div class="mt-4">
    <table id="tbl-menu" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jenis</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Image</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $p )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $p->jenis->nama_jenis }}</td>
                <td>{{ $p->nama_menu }}</td>
                <td>{{ $p->harga }}</td>
                <td>{{ $p->stok }}</td>
                <td><img src="{{ asset('storage/menu-image/'.$p->image)}}" height="90px" width="90px"></td>
                <td>{{ $p->deskripsi }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" 
                        data-id="{{ $p->id }}" 
                        data-jenis_id="{{ $p->jenis_id }}" 
                        data-nama_menu="{{ $p->nama_menu }}"
                        data-harga="{{ $p->harga }}"
                        data-stok="{{ $p->stok }}"
                        data-image="{{ $p->image }}"
                        data-deskripsi="{{ $p->deskripsi }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('menu/'.$p->id) }}" style="display:inline" method="POST">
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