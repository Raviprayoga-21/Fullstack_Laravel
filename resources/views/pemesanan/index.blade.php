@extends('template.layout2')

@push('style')
@endpush

@section('content')
    <section class="content">
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>

                        <!-- Daftar orderan yang sedang diproses -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Daftar Menu</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <!-- Tabel daftar orderan -->
                                        <ul class="menu-container">
                                            @foreach ($jenis as $j)
                                                <li>
                                                    <h3>{{ $j->nama_jenis }}</h3>
                                                    <ul class="menu-item" style="cursor: pointer;">
                                                        @foreach ($j->menu as $menu)
                                                            <li data-harga="{{ $menu->harga }}"
                                                                data-id="{{ $menu->id }}">
                                                                <img src="{{ asset('menu-image') }}/{{ $menu->image }}" alt="">
                                                                <div>
                                                                    {{ $menu->nama_menu }} <br />
                                                                    Harga: {{ $menu->harga }} <br />
                                                                    @foreach($menu->stok as $stok)
                                                                         Stok: {{ $stok->jumlah }} <br />
                                                                     @endforeach <br />
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .ordered-item {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    background-color: lightcyan;
                                    border-radius: 5px;
                                    box-shadow: 0 2px 4px #ccc;
                                }

                                .ordered-item-container {
                                    display: flex;
                                    align-items: center;
                                }

                                .ordered-item-image {
                                    width: 50px;
                                    margin-right: 10px;
                                }

                                .ordered-item-details {
                                    flex: 1;
                                }

                                .ordered-item-name {
                                    margin: 0;
                                    font-size: 16px;
                                    font-weight: bold;
                                }

                                .ordered-item-price {
                                    margin: 5px 0;
                                    font-size: 14px;
                                    color: #666;
                                }

                                .ordered-item-actions {
                                    display: flex;
                                    align-items: center;
                                }

                                .qty-item {
                                    width: 40px;
                                    text-align: center;
                                    margin: 0 5px;
                                    border: 1px solid #ccc;
                                    border-radius: 3px;
                                }

                                .subtotal {
                                    margin: 0;
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: black;
                                }

                                .remove-item,
                                .btn-dec,
                                .btn-inc {
                                    background-color: lightcyan;
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                }

                                .remove-item:hover,
                                .btn-dec:hover,
                                .btn-inc:hover {
                                    background-color: #c82333;
                                }

                                .pagetitle {
                                    text-align: center;
                                    margin-bottom: 20px;
                                }

                                .pagetitle h1 {
                                    font-size: 36px;
                                    color: #333;
                                    text-shadow: 2px 2px 2px black;
                                }

                                .menu-item li {
                                    cursor: pointer;
                                    text-align: left;
                                    font-size: 14px;
                                    font-weight: bold;
                                    color: #2a3f54;
                                    margin-bottom: 10px;
                                    padding: 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;
                                    transition: all 0.3s ease;
                                }

                                .menu-item li:hover {
                                    background-color: #f0f0f0;
                                }

                                .btn-dec,
                                .btn-inc {
                                    background-color: #333;
                                    font-weight: bold;
                                    color: #fff;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 5px;
                                    transition: all 0.3s ease;
                                }

                                .remove-item {
                                    background-color: red;
                                    font-weight: bold;
                                    color: #333;
                                    border: none;
                                    border-radius: 3px;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    margin-left: 20px;
                                    transition: all 0.3s ease;
                                }

                                .btn-dec:hover,
                                .btn-inc:hover {
                                    background-color: #28a743;
                                }

                                .subtotal {
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: black;
                                    margin-left: 10px;
                                }

                                .qty-item {
                                    width: 50px;
                                    text-align: center;
                                    margin: 0 5px;
                                }

                                #total {
                                    font-size: 18px;
                                    font-weight: bold;
                                    color: black;
                                    margin-top: 10px;
                                    margin-left: 16px;
                                }

                                .main {
                                    display: flex;
                                    gap: 2rem;
                                }

                                .c {
                                    width: 700px;
                                    display: flex;
                                    flex-direction: column;
                                }

                                .container {
                                    border: 2px #fff;
                                    border-radius: 10px;
                                    box-shadow: 0 4px 8px black;
                                    display: grid;
                                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                                    gap: 30px;
                                    transition: box-shadow 0.3s;
                                }

                                .container:hover {
                                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.947);
                                }

                                .item-content {
                                    width: 400px;
                                }

                                .menu-container {
                                    padding: 0px;
                                    list-style-type: none;
                                }

                                .menu-container li h3 {
                                    text-transform: uppercase;
                                    font-weight: bold;
                                    font-size: 20px;
                                    background-color: #0930ad;
                                    padding: 10px 20px;
                                    margin: 5px 0;
                                    border-radius: 5px;
                                    transition: background-color 0.3s;
                                }

                                .menu-container li h3:hover {
                                    background-color: lightblue;
                                }

                                .menu-item {
                                    list-style-type: none;
                                    display: flex;
                                    gap: 1rem;
                                }

                                .menu-item li {
                                    display: flex;
                                    flex-direction: column;
                                    padding: 10px 20px;
                                }

                                .item-content {
                                    text-align: center;
                                    margin-top: 72px;
                                }

                                .card {
                                    width: 400px;
                                    margin: auto;
                                    background-color: #f9f9f9;
                                    border-radius: 10px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    transition: box-shadow 0.3s;
                                }

                                .card:hover {
                                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                                }

                                .card-body {
                                    padding: 20px;
                                }

                                .card-title {
                                    font-size: 24px;
                                    color: #333;
                                    margin-bottom: 15px;
                                }

                                .ordered-list {
                                    list-style: none;
                                    font-size: 16px;
                                    padding: 0;
                                }

                                .card-text {
                                    font-size: 18px;
                                }

                                .btn-bayar {
                                    background-color: #007bff;
                                    color: #fff;
                                    border: none;
                                    border-radius: 5px;
                                    padding: 10px 20px;
                                    cursor: pointer;
                                    display: inline-block;
                                }

                                .btn-bayar:hover {
                                    background-color: #0056b3;
                                }
                            </style>

                            <div class="col-md-4">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Pembayaran</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <ul class="ordered-list">
                                        </ul>
                                        Total Bayar : <h2 id="total"> 0</h2>
                                        <br />
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button id="btn-bayar" type="submit"
                                                    class="col-sm-12 btn btn-primary">Bayar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </section>
@endsection

@push('scripts')
<script>
        $(function() {
    const orderedList = [];
    let total = 0;

    const sum = () => {
        return orderedList.reduce((accumulator, object) => {
            return accumulator + (object.harga * object.qty);
        }, 0);
    };

    const changeQty = (el, inc) => {
        const id = $(el).closest('li')[0].dataset.id;
        const index = orderedList.findIndex(list => list.id == id);
        orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc;

        const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
        const txt_qty = $(el).closest('li').find('.qty-item')[0];
        txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc;
        txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

        $('#total').html(sum());
    };

    $('.ordered-list').on('click', '.btn-dec', function() {
        changeQty(this, -1);
    });
    $('.ordered-list').on('click', '.btn-inc', function() {
        changeQty(this, 1);
    });
    $('.ordered-list').on('click', '.remove-item', function() {
        const item = $(this).closest('li')[0];
        let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id));
        orderedList.splice(index, 1);
        $(item).closest('li').remove();
        $('#total').html(sum());
    });
    $('#btn-bayar').on('click', function() {
        // Ambil nilai total pembayaran dari HTML
        const totalBayar = parseInt($('#total').text());

        // Validasi apakah jumlah bayar sudah diisi
        const jumlahBayar = parseInt(prompt("Masukkan jumlah pembayaran:"));
        if (isNaN(jumlahBayar) || jumlahBayar < totalBayar) {
            Swal.fire('Jumlah pembayaran tidak valid!');
            return;
        }

        // Hitung kembalian
        const kembalian = jumlahBayar - totalBayar;

        $.ajax({
            url: "{{ route('transaksi.store') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                orderedList: orderedList,
                total: totalBayar // Menggunakan total bayar dari variabel
            },
            success: function(data) {
                console.log(data);
                Swal.fire({
                    title: data.message,
                    showDenyButton: true,
                    confirmButtonText: "Cetak Nota",
                    denyButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open("{{ url('nota') }}/" + data.notrans)
                        location.reload()
                    } else if (result.isDenied) {
                        location.reload()
                    }
                });
                // Update stok di server-side
                orderedList.forEach(item => {
                    $.ajax({
                        url: "{{ route('update-stok') }}",
                        method: "PUT",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": item.id,
                            "qty": item.qty
                        },
                        success: function(response) {
                            console.log(response);
                            // Di sini kamu bisa menambahkan logika jika update stok berhasil
                        },
                        error: function(request, status, error) {
                            console.log(status, error)
                            // Di sini kamu bisa menambahkan logika jika update stok gagal
                        }
                    });
                });
            },
            error: function(request, status, error) {
                console.log(status, error)
                Swal.fire('Pemesanan Gagal!!')
            }
        });

        // Tampilkan kembalian menggunakan alert
        alert(`Jumlah Bayar: ${jumlahBayar}\nKembalian: ${kembalian}`);
    });
    $('.menu-item li').on('click', function() {
        const menu_clicked = $(this).text();
        const data = $(this)[0].dataset;
        const harga = parseFloat(data.harga);
        const id = parseInt(data.id);

        if (orderedList.every(list => list.id !== id)) {
            let dataN = {
                'id': id,
                'menu': menu_clicked,
                'harga': harga,
                'qty': 1,
            };
            orderedList.push(dataN);
            let listOrder = `<li data-id="${id}"><h4>${menu_clicked}</h4>`;
            listOrder += `Harga: Rp.${harga}`;
            listOrder += `<button class="remove-item">Hapus</button><br />
                          <button class="btn-dec">-</button>`;
            listOrder += `<input class="qty-item"
                          type="number"
                          value="1"
                          style="width: 35px"
                          readonly />
                          <button class="btn-inc">+</button><h2>
                          <span class="subtotal">${harga * 1}</span>
                          </li>`;
            $('.ordered-list').append(listOrder)
        }
        $('#total').html(sum());
    });
});
</script>
@endpush



