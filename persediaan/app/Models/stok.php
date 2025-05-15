<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;
    protected $fillable = ["kode_produk","nama_produk","tgl_produksi","tgl_exp","harga",
    "stok","satuan","produk_id","produkmasuk_id","produkkeluar_id"];


    public function produk()
    {
        return $this->belongsTo(produk::class,'produk_id','kode_produk');
    }
    public function produkmasuk()
    {
        return $this->belongsTo(produkMasuk::class,'produkmasuk_id','id');
    }
    public function produkkeluar()
    {
        return $this->belongsTo(produkKeluar::class,'produkkeluar_id','id');
    }
}
