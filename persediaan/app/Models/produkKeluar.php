<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkKeluar extends Model
{
    use HasFactory;

    protected $table = 'produk_keluars';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'tgl_keluar',
        'tgl_exp',
        'jumlah',
        'status',
        'produk_id',
    ];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
