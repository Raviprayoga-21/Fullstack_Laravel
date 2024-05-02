<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaffeRavi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            margin-top: 50px;
        }
        hr {
            margin-top: 20px;
        }
        .transaction {
            margin: 0 auto;
            max-width: 600px;
            width: 100%;
            border: 2px solid #000;
        }
        .transaction-details {
            padding: 10px;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            text-align: left;
        }
        .transaction-items {
            text-align: left;
            padding: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr; /* Membagi item ke dalam 4 kolom */
            gap: 10px; /* Jarak antar kolom */
        }
        .transaction-item p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h2>CaffeRavi</h2>
    <h3>Transaksi</h3>
    <hr>
    @if(isset($transaksi))
        <div class="transaction">
            <div class="transaction-details">
                <p><strong>NO. FAKTUR:</strong> {{ $transaksi->id }}</p>
                <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
            </div>
            <div class="transaction-items">
                @foreach($transaksi->detailTransaksi as $item)
                    <div class="transaction-item">
                        <p><strong>Menu:</strong> {{ $item->menu->nama_menu }}</p>
                        <p><strong>Harga:</strong> {{ number_format($item->menu->harga, 0, "," , ".") }}</p>
                        <p><strong>Jumlah:</strong> {{ $item->jumlah }}</p>
                        <p><strong>Total:</strong> {{ number_format($item->subtotal, 0, "," , ".") }}</p>
                    </div>
                @endforeach
            </div>
            <div class="transaction-details">
                <p><strong>Total:</strong> {{ number_format($transaksi->total_harga, 0, ",", ".") }}</p>
            </div>
            
        </div>
    @else
        <p>No transaction found.</p>
    @endif
</body>
</html>
