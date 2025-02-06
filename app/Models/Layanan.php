<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';

    protected $fillable = 
    [
        'layanan',
        'harga_per_kg',
    ];
    public function getHargaPerKgFormattedAttribute()
    {
        return 'Rp. ' . number_format($this->harga_per_kg, 0, ',', '.');
    }

}
