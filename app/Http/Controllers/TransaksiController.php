<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailTransaksi;
use App\Models\Jenis;
use App\Models\Menu;
use App\Models\Stok;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('detailTransaksi.menu')->get();
        return view('laporan.index', compact('transaksi'));
    }
    

    public function store(StoreTransaksiRequest $request)
    {
        try {
            DB::beginTransaction();

            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();
            $notrans = $last_id == null ? date('Ymd').'0001' : date('Ymd').sprintf('%04d', substr($last_id->id, 8, 4)+1);

            $jumlahBayar = $request->jumlah_bayar;
            $kembalian = $jumlahBayar - $request->total;

            $insertTransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'jumlah_bayar' => $jumlahBayar,
                'kembalian' => $kembalian,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);

            if (!$insertTransaksi->exists) {
                return response()->json(['status' => false, 'message' => 'Pemesanan Gagal!']);
            }

            foreach ($request->orderedList as $detail) {
                $stok = Stok::where('menu_id', $detail['id'])->first();
                $stok->update([
                    'jumlah'=>$stok->jumlah - $detail['qty']
                ]);
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty'],
                ]);


            }

            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'notrans' => $notrans]);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal!', 'error' => $e->getMessage()]);
        }
    }

    public function faktur($nofaktur)
    {
        try {
            $data['transaksi'] = Transaksi::where('id', $nofaktur)
                ->with(['detailTransaksi' => function ($query) {
                    $query->with('menu');
                }])->first();
    
            return view('faktur.index')->with(($data));
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'Pemesanan Gagal!']);
        }
        // } catch (ModelNotFoundException $e) 
        // {
        //     return response()->json(['status' => false, 'message' => 'Transaction not found.']);
        // } catch (\Exception $e) {
        //     return response()->json(['status' => false, 'message' => 'Error: ' . $e->getMessage()]);
        // }
    }
    
    
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        // Your update method code here
    }

    public function destroy(Transaksi $transaksi)
    {
        // Your destroy method code here
    }

    public function exportData()
    {
        // $date = date('Y-m-d');
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
