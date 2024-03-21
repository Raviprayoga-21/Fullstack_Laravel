<div class="mt-4">
    <table id="tbl-jenis" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Meja</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meja as $m )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $m->nomor_meja }}</td>
                <td>{{ $m->kapasitas }}</td>
                <td>{{ $m->status }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" data-id="{{ $m->id }}" data-nomor_meja="{{ $m->nomor_meja }}" data-kapasitas="{{ $m->kapasitas }}" data-status="{{ $m->status }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('meja/'.$m->id) }}" style="display:inline" method="POST">
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