<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Barryvdh\DomPDF\Facade\Pdf;
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

    // Cek apakah sudah ada kode_produk yang sama
    $existing = ProdukMasuk::where('kode_produk', $validated['kode_produk'])->first();

    if ($existing) {
        // Jika ada, update jumlah
        $existing->jumlah += $validated['jumlah'];
        $existing->nama_produk = $validated['nama_produk'];
        $existing->tgl_masuk = $validated['tgl_masuk'];
        $existing->tgl_produksi = $validated['tgl_produksi'];
        $existing->tgl_exp = $validated['tgl_exp'];
        $existing->produk_id = $validated['produk_id'];
        $existing->save();
    } else {
        // Jika tidak ada, buat baru
        ProdukMasuk::create($validated);
    }

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

    //cetak laporan produk masuk
    public function indexLaporan(Request $request)
    {
        $query = \App\Models\ProdukMasuk::query();

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tgl_masuk', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $produkMasuk = $query->get();
        return view('laporanpm.index', compact('produkMasuk'));
    }

    public function cetakLaporan(Request $request)
    {
        $query = \App\Models\ProdukMasuk::query();

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tgl_masuk', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $produkMasuk = $query->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('laporanpm.laporan', compact('produkMasuk'));
        return $pdf->download('laporan-produk-masuk.pdf');
    }
}
