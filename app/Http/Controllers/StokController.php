<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use illuminate\Suporrt\Facades\DB;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Models\Menu;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StokImport;
use App\Exports\StokExport;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['stok'] = Stok::with(['menu'])->get();
            $data['menu'] = Menu::get();
            return view('stok.index')->with($data);
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
    public function store(StoreStokRequest $request)
    {
        Stok::create($request->all());

        return redirect('stok')->with('susccess', 'Data berhasil di tambahkan!');
    }

    public function exportData()
    {
        // $date = date('Y-m-d');
        return Excel::download(new StokExport, 'stok.xlsx');
    }

    public function importData()
    {
        Excel::import(new StokImport, request()->file('import'));
        
        return redirect('kategori')->with('success', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        $stok->update($request->all());
        return redirect('stok')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect('stok')->with('success','Data berhasil dihapus!');
    }
}
