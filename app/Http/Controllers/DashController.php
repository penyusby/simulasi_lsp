<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        $transaksilunas = Transaksi::where('pembayaran', 'Lunas')->count();
        $transaksibelumlunas= Transaksi::where('pembayaran', 'Belum Bayar')->count();
        $transaksibaru =Transaksi::whereDate('created_at', today())->count();
        $transaksiproses= Transaksi::where('keterangan', 'Proses')->count();
        
        $dashboard = Transaksi::all();
        return view('beranda', compact('transaksilunas','transaksibelumlunas','transaksibaru','transaksiproses','dashboard'));
        
    }


}
