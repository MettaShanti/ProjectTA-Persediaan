<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        //panggil model produkMasuk
        $result = produkMasuk::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view produkMasuk/index.blade.php
        return view('produkMasuk.index')->with('produkMasuk', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = produk::all();
        return view('produkMasuk.create')->with('produk', $produk);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "produk_id"     =>"required",
            "kode_produk"   =>"required",
            "tgl_masuk"     =>"required",
            "tgl_produksi"  =>"required",
            "tgl_exp"       =>"required",
            "jumlah"        =>"required",
        ]);
        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($request->produk_id);

    // Tambahkan nama_produk ke input jika kamu memang menyimpannya di tabel produk_masuks
    $input['nama_produk'] = $produk->nama_produk;

        //simpan
        produkMasuk::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('produkMasuk.index')->with('success', $request->nama_roduk.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(produkMasuk $produkMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // edit data
        $produkMasuk = produkMasuk::findOrFail($id); // Data yang akan diedit
        $produk = produk::all(); // Ambil semua produk untuk dropdown

        return view('produkMasuk.edit', [
        'produkMasuk' => $produkMasuk,
        'produk' => $produk // kirim ke view
    ]);
        //$produk = produk::find($id);
        //$produkMasuk = produkMasuk::find($id);
        //return view('produkMasuk.edit')->with('produkMasuk', $produkMasuk)->with('produk', $produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produkMasuk = produkMasuk::find($id);
        $input = $request->validate([
            "produk_id"     =>"required",
            "kode_produk"   =>"required",
            "tgl_masuk"     =>"required",
            "tgl_produksi"  =>"required",
            "tgl_exp"       =>"required",
            "jumlah"        =>"required",

        ]);
        //update
        $produkMasuk->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('produkMasuk.index')->with('success', $request->nama_produk.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $produkMasuk = produkMasuk::find($id);

    if (!$produkMasuk) {
        return redirect()->route('produk.index')->with('error', 'Data not found.');
    }
    $produkMasuk->delete();
    return redirect()->route('produkMasuk.index')->with('success', 'Data Produk Masuk Berhasil di Hapus');
    }
}
