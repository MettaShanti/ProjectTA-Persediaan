<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ["kode_produk","nama_produk","jenis","harga","satuan","supplier_id"];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}
