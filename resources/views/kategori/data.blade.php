<div class="mt-4">
    <table id="tbl-kategori" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" data-id="{{ $k->id }}" data-nama_kategori="{{ $k->nama_kategori }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('kategori/'.$k->id) }}" style="display:inline" method="POST">
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