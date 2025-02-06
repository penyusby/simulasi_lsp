<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Layanan;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all(); // Mengambil semua data transaksi
        return view('transaksi', compact('transaksi')); // Kirim ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = Layanan::all();
        return view('transaksi_tambah', compact('layanan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:1',
        ]);
    
        $layanan = Layanan::findOrFail($request->layanan_id);
    
        $total_harga = $layanan->harga_per_kg * $request->berat;
    
        Transaksi::create([
            'tanggal' => $request->tanggal,
            'nama_pelanggan' => $request->nama_pelanggan,
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'total_harga' => $total_harga,
            'keterangan' => $request->keterangan ?? 'Proses',
            'pembayaran' => $request->pembayaran ?? 'Belum Bayar',
        ]);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
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
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $layanan = Layanan::all();
        return view('transaksi_ubah', compact('transaksi', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:1'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $layanan = Layanan::findOrFail($request->layanan_id);

        $total_harga = $layanan->harga_per_kg * $request->berat;

        $transaksi->update([
            'tanggal' => $request->tanggal,
            'nama_pelanggan' => $request->nama_pelanggan,
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'total_harga' => $total_harga,
            'keterangan' => $request->keterangan ?? $transaksi->keterangan,
            'pembayaran' => $request->pembayaran ?? $transaksi->pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
    public function cetakStruk($id)
    {
        $transaksi = Transaksi::with('layanan')->findOrFail($id); // Ambil data transaksi dengan relasi layanan
        return view('transaksi_cetak', compact('transaksi')); // Tampilkan view cetak
    }
}
