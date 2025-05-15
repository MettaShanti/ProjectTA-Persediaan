<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\supplier;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with('supplier')->get();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $suppliers = supplier::all();
        return view('produk.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:30',
            'jenis' => 'required|string|max:15',
            'harga' => 'required|integer',
            'satuan' => 'required|string|max:20',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // Generate kode_produk otomatis
        $last = Produk::orderByDesc('kode_produk')->first();
        if ($last && preg_match('/P(\d+)/', $last->kode_produk, $m)) {
            $next = (int)$m[1] + 1;
        } else {
            $next = 1;
        }
        $validated['kode_produk'] = 'P' . str_pad($next, 4, '0', STR_PAD_LEFT);

        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $suppliers = Supplier::all();
        return view('produk.edit', compact('produk', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:30',
            'jenis' => 'required|string|max:15',
            'harga' => 'required|integer',
            'satuan' => 'required|string|max:20',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
