<div class="mt-4">
    <table id="tbl-kategori" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stok as $s )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $s->jumlah }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" data-id="{{ $s->id }}" data-jumlah="{{ $s->jumlah }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('stok/'.$s->id) }}" style="display:inline" method="POST">
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