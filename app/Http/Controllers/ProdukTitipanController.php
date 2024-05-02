<?php

namespace App\Http\Controllers;

use illuminate\Suporrt\Facades\DB;
use App\Models\ProdukTitipan;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukTitipanExport;
use App\Imports\ProdukTitipanImport;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data['produktitipan'] = ProdukTitipan::get();
            return view('produktitipan.index')->with($data);
        }
        catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function cetakProdukTitipan()
    {
            $data['produktitipan'] = ProdukTitipan::with('produktitipan')->get();
            return view('produktitipan.cetak')->with($data);
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
    public function store(StoreProdukTitipanRequest $request)
    {
        ProdukTitipan::create($request->all());

        return redirect('produktitipan')->with('susccess', 'Data berhasil di tambahkan!');
    }

    public function exportdata()
    {
        // $date = date('Y-m-d');
        return Excel::download(new ProdukTitipanExport, 'produktitipan.xlsx');
    }

    public function importdata()
    {
        Excel::import(new ProdukTitipanImport, request()->file('import'));
        
        return redirect('produktitipan')->with('susccess', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produktitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produktitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, ProdukTitipan $produktitipan)
    {
        $produktitipan->update($request->all());
        return redirect('produktitipan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $produktitipan)
    {
        $produktitipan->delete();
        return redirect('produktitipan')->with('success','Data berhasil dihapus!'); 
    }
}
