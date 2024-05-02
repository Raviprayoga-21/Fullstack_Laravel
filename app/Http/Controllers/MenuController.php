<?php

namespace App\Http\Controllers;

use illuminate\Suporrt\Facades\DB;
use App\Models\Menu;
use PDOException;
use Exception;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Jenis;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data['menu'] = Menu::with(['jenis'])->get();
            $data['jenis'] = Jenis::get();
            return view('menu.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $image = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'menu-image/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($image));

        $data['jenis_id'] = $request->jenis_id;
        $data['nama_menu'] = $request->nama_menu;
        $data['harga'] = $request->harga;
        $data['stok'] = $request->stok;
        $data['image'] = $filename;
        $data['deskripsi'] = $request->deskripsi;

        Menu::create($data);
        return redirect('menu')->with('success', 'Data menu berhasil di tambahkan!');
    }

    public function exportdata()
    {
        // $date = date('Y-m-d');
        return Excel::download(new MenuExport, 'menu.xlsx');
    }

    public function importdata()
    {
        Excel::import(new MenuImport, request()->file('import'));
        
        return redirect('absensikaryawan')->with('susccess', 'Data berhasil di tambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        if ($request->file('image')) {
            if($request->old_image){
                Storage::disk('public')->delete('menu-image/'.$request->old_image);
            }

            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'menu-image/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($image));
            $data['image'] = $filename;
        }


        $data['jenis_id'] = $request->jenis_id;
        $data['nama_menu'] = $request->nama_menu;
        $data['harga'] = $request->harga;
        $data['stok'] = $request->stok;
        $data['deskripsi'] = $request->deskripsi;

        $menu->update($data);
        return redirect('menu')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('menu')->with('success','Data menu berhasil dihapus!'); 
    }
}