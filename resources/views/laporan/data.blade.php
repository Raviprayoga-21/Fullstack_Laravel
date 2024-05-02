<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-laporan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Transaksi ID</th>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $p)
                @foreach ($p->detailTransaksi as $detail)
                <tr>
                        <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->id }}</td>
                        <td>{{ $detail->menu->nama_menu }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>{{ $detail->subtotal }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>