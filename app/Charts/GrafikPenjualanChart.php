<?php

namespace App\Charts;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\DetailTransaksi;
use Carbon\Carbon;

class GrafikPenjualanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Request $request): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $tanggal = $request->tanggal ? Carbon::parse($request->tanggal) : Carbon::today();
    
        $penjualan = DetailTransaksi::selectRaw('DATE(created_at) as tanggal, sum(subtotal) as total')
            ->whereDate('created_at', $tanggal)
            ->groupBy('tanggal')
            ->get();
    
        // Menginisialisasi array untuk menyimpan data yang akan ditambahkan ke grafik
        $data = [];
    
        // Meloopi data penjualan dan menambahkannya ke array data
        foreach ($penjualan as $dataPenjualan) {
            // Konversi total menjadi integer
            $data[] = (int) $dataPenjualan->total;
        }
    
        // Mengambil label untuk sumbu X, dalam hal ini saya menggunakan bulan
        $labels = $penjualan->pluck('tanggal')->toArray();
    
        return $this->chart->areaChart()
            ->setTitle('Grafik Penjualan Kafe')
            ->setSubtitle(date('Y'))
            ->setWidth(800)
            ->setHeight(200)
            ->addData('Penjualan', $data) // Menambahkan data dengan label 'Penjualan' dan nilai dari $data
            ->setXAxis($labels); // Mengatur sumbu X dengan label bulan
    }
    
}
