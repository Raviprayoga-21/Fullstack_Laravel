<div class="mt-4">
    <table id="tbl-jenis" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $j )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $j->nama_jenis }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" data-id="{{ $j->id }}" data-nama_jenis="{{ $j->nama_jenis }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('jenis/'.$j->id) }}" style="display:inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete-data" type="submit" style="color:red" title="delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>