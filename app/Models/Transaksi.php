<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    protected $fillable =
        [
            'tanggal',
            'nama_pelanggan',
            'layanan_id',
            'berat',
            'total_harga',
            'keterangan',
            'pembayaran',
        ];
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

}
