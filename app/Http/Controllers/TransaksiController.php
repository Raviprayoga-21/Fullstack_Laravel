<?php

namespace App\Http\Controllers;

use illuminate\Suporrt\Facades\DB;
use App\Models\Transaksi;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['transaksi'] = Transaksi::get();
            return view('transaksi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        Transaksi::create($request->all());

        return redirect('transaksi')->with('susccess', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());
        return redirect('transaksi')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('transaksi')->with('success','Data berhasil dihapus!'); 
    }
}
