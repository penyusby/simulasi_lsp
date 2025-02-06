<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::all();// Ambil semua data dari tabel tb_layanan
        return view('layanan', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('layanan_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([

            'layanan'=>'required',
            'harga_per_kg'=>'required'
        ]);
        Layanan::create ($request->all());
        return redirect()->route('layanan.index')-> with('succes', 'Data Layanan telah di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanan_ubah', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'layanan' => 'required|string|max:255',
            'harga_per_kg' => 'required|numeric',
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('layanans')->where('id', $id)->delete();
        return redirect()->route('layanan.index')->with('success', 'Data berhasil dihapus.');

    }
}
