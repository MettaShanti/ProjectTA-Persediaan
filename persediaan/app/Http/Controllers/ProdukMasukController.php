<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\produkMasuk;
use Illuminate\Http\Request;

class ProdukMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkMasuk = ProdukMasuk::with('produk')->get();
        return view('produkMasuk.index', compact('produkMasuk'));
    }

    public function create()
    {
        $produks = produk::all();
        return view('produkMasuk.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required|string|max:30',
            'tgl_masuk' => 'required|date',
            'tgl_produksi' => 'required|date',
            'tgl_exp' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'produk_id' => 'required|exists:produks,id',
        ]);

        ProdukMasuk::create($validated);

        return redirect()->route('produkMasuk.index')->with('success', 'Produk masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produkMasuk = ProdukMasuk::findOrFail($id);
        $produks = Produk::all();
        return view('produkMasuk.edit', compact('produkMasuk', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $produkMasuk = ProdukMasuk::findOrFail($id);
        $validated = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required|string|max:30',
            'tgl_masuk' => 'required|date',
            'tgl_produksi' => 'required|date',
            'tgl_exp' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'produk_id' => 'required|exists:produks,id',
        ]);
        $produkMasuk->update($validated);

        return redirect()->route('produkMasuk.index')->with('success', 'Produk masuk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produkMasuk = ProdukMasuk::findOrFail($id);
        $produkMasuk->delete();
        return redirect()->route('produkMasuk.index')->with('success', 'Produk masuk berhasil dihapus');
    }
}
