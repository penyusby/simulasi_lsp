<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resources(['layanan' => LayananController::class, 'transaksi' => TransaksiController::class,]);
// Route::get('/beranda', function () {
//     return view('beranda');
// });
// Route::resource('/', DashController::class)->

Route::get('/', [DashController::class, 'index'])->name('beranda.index');
Route::get('/transaksi/cetak/{id}', [TransaksiController::class, 'cetakStruk'])->name('transaksi.cetak');
Route::patch('/transaksi/{id}/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
