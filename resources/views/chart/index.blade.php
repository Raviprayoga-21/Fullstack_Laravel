@extends('template.layout2')
@push('styles')
@endpush

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <div class="row" style="margin-left: 8px;">

                        <!-- jumlah transaksi -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-info text-uppercase mb-1"
                                                style="font-size: 20px">
                                                Jumlah Transaksi Hari Ini
                                            </div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $totalTransaksi }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menampilkan Jumlah Menu -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-success text-uppercase mb-1"
                                                style="font-size: 23px">
                                                Jumlah Menu
                                            </div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $totalMenu }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pendapatan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-info text-uppercase mb-1"
                                                style="font-size: 20px;">
                                                Total Pendapatan
                                            </div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">RP
                                                {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Transaksi -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="tanggal m-2 ms-4">
                                        <label for="tanggal_mulai">Tanggal Awal :</label>
                                        <input type="date" id="tanggal_mulai" name="tanggal_mulai">

                                        <label for="tanggal_selesai">Tanggal Akhir:</label>
                                        <input type="date" id="tanggal_selesai" name="tanggal_selesai">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Grafik Chart -->
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Grafik Pendapatan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="areaChart" style="width: 400px; height: 320px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Top 3 Stok Menu Terendah -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="font-weight-bold text-info text-uppercase mb-1"
                                                        style="font-size: 20px;">
                                                        Stok Menu Terendah
                                                    </div>
                                                    @foreach ($stokTerendah as $stok)
                                                        <div class="card mb-3" style="max-width: 18rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $stok->menu->nama_menu }}</h5>
                                                                <p class="card-text">Stok: {{ $stok->jumlah }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menu yang sering dipesan -->
                        <div class="col-xl-5.2 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header text-center">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1" style="font-size: 20px;">
                                        Menu yang sering dipesan
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            @foreach ($menuInfo as $menu)
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h2 class="card-title">{{ $menu['nama_menu'] }}
                                                                <h4 style="float: right;">
                                                                    Rp.{{ number_format($menu['harga'], 0, ',', '.') }}</h4>
                                                            </h2>
                                                            <p class="card-text">Jumlah Pesanan:
                                                                {{ $menu['jumlah_pesanan'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transaksi Terbaru -->
                        <div class="col-xl-5.2 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header text-center">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1" style="font-size: 20px;">
                                        Transaksi Terbaru
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach ($transaksiTerbaru as $transaksi)
                                        <div class="row">
                                            <div class="col-6">
                                                <p><strong>No. Transaksi:</strong> {{ $transaksi->id }}</p>
                                                <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
                                                <p><strong>Total Harga:</strong>
                                                    Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                        @if (!$loop->last)
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Load library Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>
        <!-- End of Wrapper -->

    </body>

    </html>
@endsection

@push('scripts')
    <script>
    var ctx = document.getElementById('areaChart').getContext('2d');
        var dailyIncomeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($totalPendapatanPerHari)) !!},
                    datasets: [{
                        label: 'Pendapatan Per Hari',
                        data: {!! json_encode(array_values($totalPendapatanPerHari)) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgb(0, 123, 255)',
                        borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                $('#tanggal_mulai, #tanggal_selesai').change(function() {
                var tanggalMulai = $('#tanggal_mulai').val();
                var tanggalSelesai = $('#tanggal_selesai').val();
                $.ajax({
                    url: '/get-chart-data',
                    type: 'GET',
                    data: {
                        tanggal_mulai: tanggalMulai,
                        tanggal_selesai: tanggalSelesai
                    },
                    success: function(data) {
                        dailyIncomeChart.data.labels = Object.keys(data);
                        dailyIncomeChart.data.datasets[0].data = Object.values(data);
                        dailyIncomeChart.update();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
    </script>
@endpush
