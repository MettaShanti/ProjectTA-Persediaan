<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\produkKeluar;
use Illuminate\Http\Request;

class ProdukKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkKeluars = ProdukKeluar::with('produk')->get();
        return view('produkKeluar.index', compact('produkKeluars'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('produkKeluar.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'kode_produk' => 'required|string|max:10|unique:produk_keluars,kode_produk',
        'nama_produk' => 'required|string|max:30',
        'tgl_keluar' => 'required|date',
        'tgl_exp' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'status' => 'required|string',
        'produk_id' => 'required|exists:produks,id',
    ]);

    // Kurangi stok produk
    $produk = \App\Models\Produk::findOrFail($validated['produk_id']);
    if ($produk->stok < $validated['jumlah']) {
        return back()->withErrors(['jumlah' => 'Stok produk tidak mencukupi!'])->withInput();
    }
    $produk->stok -= $validated['jumlah'];
    $produk->save();

    ProdukKeluar::create($validated);

    return redirect()->route('produkKeluar.index')->with('success', 'Produk keluar berhasil ditambahkan dan stok berkurang');
    }

    public function edit($id)
    {
        $produkKeluar = ProdukKeluar::findOrFail($id);
        $produks = produk::all();
        return view('produkKeluar.edit', compact('produkKeluar', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $produkKeluar = ProdukKeluar::findOrFail($id);
        $validated = $request->validate([
            'kode_produk' => 'required|string|max:10|unique:produk_keluars,kode_produk,' . $id,
            'nama_produk' => 'required|string|max:30',
            'tgl_keluar' => 'required|date',
            'tgl_exp' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'status' => 'required|string',
            'produk_id' => 'required|exists:produks,id',
        ]);
        $produkKeluar->update($validated);

        return redirect()->route('produkKeluar.index')->with('success', 'Produk keluar berhasil diupdate');
    }

    public function destroy($id)
    {
        $produkKeluar = ProdukKeluar::findOrFail($id);
        $produkKeluar->delete();
        return redirect()->route('produkKeluar.index')->with('success', 'Produk keluar berhasil dihapus');
    }
}
