<?php

namespace App\Http\Controllers;

use illuminate\Suporrt\Facades\DB;
use App\Models\AbsensiKaryawan;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreAbsensiKaryawanRequest;
use App\Http\Requests\UpdateAbsensiKaryawanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiKaryawanExport;
use App\Imports\AbsensiKaryawanImport;

class AbsensiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['absensikaryawan'] = AbsensiKaryawan::get();
            return view('absensikaryawan.index')->with($data);

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
    public function store(StoreAbsensiKaryawanRequest $request)
    {
        AbsensiKaryawan::create($request->all());

        return redirect('absensikaryawan')->with('susccess', 'Data berhasil di tambahkan!');
    }

    public function exportdata()
    {
        // $date = date('Y-m-d');
        return Excel::download(new AbsensiKaryawanExport, 'absensikaryawan.xlsx');
    }

    public function importdata()
    {
        Excel::import(new AbsensiKaryawanImport, request()->file('import'));
        
        return redirect('absensikaryawan')->with('susccess', 'Data berhasil di tambahkan!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(AbsensiKaryawan $absensikaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiKaryawan $absensikaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiKaryawanRequest $request, AbsensiKaryawan $absensikaryawan)
    {
        $absensikaryawan->update($request->all());
        return redirect('absensikaryawan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiKaryawan $absensikaryawan)
    {
        $absensikaryawan->delete();
        return redirect('absensikaryawan')->with('success','Data berhasil dihapus!'); 
    }
}
