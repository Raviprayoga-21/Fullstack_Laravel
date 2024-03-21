<div class="mt-4">
    <table id="tbl-produktitipan" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Nama Supplier</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produktitipan as $p )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_supplier }}</td>
                <td>{{ $p->harga_beli }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->keterangan }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" 
                    data-id="{{ $p->id }}" 
                    data-nama_produk="{{ $p->nama_produk }}" 
                    data-nama_supplier="{{ $p->nama_supplier }}" 
                    data-harga_beli="{{ $p->harga_beli }}" 
                    data-harga_jual="{{ $p->harga_jual }}" 
                    data-stok="{{ $p->stok }}" 
                    data-keterangan="{{ $p->keterangan }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('produktitipan/'.$p->id) }}" style="display:inline" method="POST">
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