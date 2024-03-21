<?php

namespace App\Http\Controllers;

use illuminate\Suporrt\Facades\DB;
use App\Models\Pemesanan;
use App\Models\Jenis;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['pemesanan'] = Pemesanan::get();
            $data['jenis'] = Jenis::get();
            return view('pemesanan.index')->with($data);
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
    public function store(StorePemesananRequest $request)
    {
        Pemesanan::create($request->all());

        return redirect('pemesanan')->with('susccess', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $pemesanan->update($request->all());
        return redirect('pemesanan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect('pemesanan')->with('success','Data berhasil dihapus!'); 
    }
}
