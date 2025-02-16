<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    protected $guarded = [];   
     public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

}
