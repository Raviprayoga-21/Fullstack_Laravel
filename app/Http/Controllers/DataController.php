<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Stok;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;

class DataController extends Controller
{
    public function tampilkanGrafikBetween($tanggalMulai, $tanggalSelesai): array
    {
        $totalPendapatanPerHari = [];

        $tanggalSekarang = $tanggalMulai;
        while ($tanggalSekarang <= $tanggalSelesai) {
            $tanggalFormat = date('d/m', strtotime($tanggalSekarang));
            $totalPendapatan = Transaksi::where('tanggal', $tanggalSekarang)->sum('total_harga');
            $totalPendapatanPerHari[$tanggalFormat] = $totalPendapatan;
            $tanggalSekarang = date('Y-m-d', strtotime($tanggalSekarang . ' +1 day'));
        }

        return $totalPendapatanPerHari;
    }

    public function getDataChart(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $data = $this->tampilkanGrafikBetween($tanggalMulai, $tanggalSelesai);
        return response()->json($data);
    }

    public function index(Request $request)
    {

        // Mendapatkan data stok terendah dari menu
        $stokTerendah = Stok::orderBy('jumlah', 'asc')->take(3)->get();

        // Mengambil tanggal dari request jika ada, jika tidak ada, gunakan tanggal hari ini
        $tanggal = $request->tanggal ? Carbon::parse($request->tanggal) : Carbon::today();

        // Mengambil data penjualan berdasarkan filter tanggal
        $penjualan = DetailTransaksi::selectRaw('DATE(created_at) as tanggal, sum(subtotal) as total')
            ->whereDate('created_at', $tanggal)
            ->groupBy('tanggal')
            ->get();

        // Mengambil data menu yang sering dipesan pada tanggal yang dipilih
        $menuTerpopuler = DB::table('detail_transaksi')
            ->select('menu_id', DB::raw('COUNT(*) as total_pesanan'))
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->whereDate('transaksi.created_at', $tanggal) // Filter berdasarkan tanggal
            ->groupBy('menu_id')
            ->orderBy('total_pesanan')
            ->take(2) // Mengambil 2 menu teratas
            ->get();

        // Mendapatkan informasi lengkap tentang menu yang sering dipesan
        $menuInfo = [];
        foreach ($menuTerpopuler as $menu) {
            $menuDetail = Menu::find($menu->menu_id);
            $menuInfo[] = [
                'nama_menu' => $menuDetail->nama_menu,
                'jumlah_pesanan' => $menu->total_pesanan,
                'harga' => $menuDetail->harga, // Menambahkan harga menu
            ];
        }

        // Menghitung total sisa stok dari semua menu
        $totalStok = Stok::sum('jumlah');

        // Menghitung total pendapatan dari semua transaksi pada tanggal yang dipilih
        $totalPendapatan = DetailTransaksi::whereDate('created_at', $tanggal)->sum('subtotal');

        // Menghitung total transaksi yang diinput
        $totalTransaksi = DetailTransaksi::whereDate('created_at', $tanggal)->count();

        // Perhitungan Laba Rugi (Contoh sederhana: Pendapatan - Pengeluaran)
        $pengeluaran = 1000000; // Contoh pengeluaran
        $labaRugi = $totalPendapatan - $pengeluaran;

        // Mendapatkan data transaksi terbaru
        $transaksiTerbaru = Transaksi::latest()->take(2)->get();

        // Tanggal awal bulan sekarang
        $tanggalAwal = Carbon::now()->startOfMonth();

        // Tanggal akhir bulan sekarang
        $tanggalAkhir = Carbon::now()->endOfMonth();

        // Menghitung Pendapatan ke Charts
        $totalPendapatanPerHari = $this->tampilkanGrafikBetween($tanggalAwal, $tanggalAkhir);

        // Mengambil jumlah total menu
        $totalMenu = Menu::count();

        // Mengirim data ke view
        return view('chart.index', [
            'penjualan' => $penjualan,
            'menuInfo' => $menuInfo,
            'totalStok' => $totalStok,
            'totalPendapatan' => $totalPendapatan,
            'totalTransaksi' => $totalTransaksi,
            'tanggal' => $tanggal->toDateString(), // Mengirim tanggal ke view
            'stokTerendah' => $stokTerendah, // Mengirim data stok terendah ke view
            'labaRugi' => $labaRugi, // Mengirim data laba rugi ke view
            'transaksiTerbaru' => $transaksiTerbaru, // Menambahkan data transaksi terbaru ke view
            'totalPendapatanPerHari' => $totalPendapatanPerHari,
            'totalMenu' => $totalMenu, // Mengirim jumlah total menu ke view
        ]);
    }
}

