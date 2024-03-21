<div class="mt-4">
    <table id="tbl-member" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Hp</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($member as $p )
            <tr>
                <td>{{ $i = (isset($i) ? ++$i : $i=1) }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>
                    <button class='btn' type="button" style="color:green" data-toggle="modal" data-target="#formModal" data-mode="edit" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" data-alamat="{{ $p->alamat }}" data-no_hp="{{ $p->no_hp }}" data-jenis_kelamin="{{ $p->jenis_kelamin }}">
                        <i class="fa fa-edit"></i>
                    </button>
                    <form action="{{ url('member/'.$p->id) }}" style="display:inline" method="POST">
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