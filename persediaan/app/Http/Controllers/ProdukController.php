<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('supplier')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $supplier = Supplier::all();
        return view('produk.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            "nama_produk"  => "required",
            "jenis"        => "required",
            "harga"        => "required|numeric",
            "satuan"       => "required",
            "supplier_id"  => "required|exists:suppliers,id",
        ]);
// Generate kode_produk otomatis
    $lastProduk = Produk::orderByDesc('kode_produk')->first();
    if ($lastProduk && preg_match('/P(\d+)/', $lastProduk->kode_produk, $matches)) {
        $nextNumber = (int)$matches[1] + 1;
    } else {
        $nextNumber = 1;
    }
    $input['kode_produk'] = 'P' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    Produk::create($input);

    return redirect()->route('produk.index')->with('success', $request->nama_produk . ' Berhasil Disimpan');
        
    }

    public function edit($kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->firstOrFail();
        $supplier = Supplier::all();
        return view('produk.edit', compact('produk', 'supplier'));
    }

    public function update(Request $request, $kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->firstOrFail();
        $input = $request->validate([
            "nama_produk"  => "required",
            "jenis"        => "required",
            "harga"        => "required|numeric",
            "satuan"       => "required",
            "supplier_id"  => "required|exists:suppliers,id",
        ]);
        $produk->update($input);

        return redirect()->route('produk.index')->with('success', $request->nama_produk . ' Berhasil Diubah');
    }

    public function destroy($kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->firstOrFail();
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data Produk Berhasil di Hapus');
    }
}