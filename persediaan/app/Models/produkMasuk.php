<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkMasuk extends Model
{
    use HasFactory;

    protected $table = 'produk_masuks'; 

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'tgl_masuk',
        'tgl_produksi',
        'tgl_exp',
        'jumlah',
        'produk_id',
];


    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
