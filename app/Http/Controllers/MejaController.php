<?php

namespace App\Http\Controllers;

use illuminate\Suporrt\Facades\DB;
use App\Models\Meja;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['meja'] = meja::get();
            return view('meja.index')->with($data);
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
    public function store(StoreMejaRequest $request)
    {
        Meja::create($request->all());

        return redirect('meja')->with('susccess', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        $meja->update($request->all());
        return redirect('meja')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect('meja')->with('success','Data berhasil dihapus!'); 
    }
}
