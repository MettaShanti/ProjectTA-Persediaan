<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        //panggil model supplier
        $result = supplier::all();
        //dd($result); untuk menampilkan data db

        // kirim data $result ke view supplier/index.blade.php
        return view('supplier.index')->with('supplier', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            "nama"      =>"required",
            "alamat"    =>"required",
            "nohp"      =>"required"
        ]);

        //simpan
        supplier::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('supplier.index')->with('success', $request->nama.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // edit data
        $supplier = supplier::find($id);
        return view('supplier.edit')->with('supplier', $supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $supplier = supplier::find($id);
        //dd(vars: $supplier);

        //validasi input nama imput disamakan dengan tabel kolom
        $input = $request->validate([
            "nama"      =>"required",
            "alamat"    =>"required",
            "nohp"      =>"required"
        ]);

        //update data
        $supplier->update($input);

        //redirect beserta pesan sukses
        return redirect()->route('supplier.index')->with('success', $request->nama.' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari data di table supplier berdasarkan "id" supplier
        $supplier = supplier::find($id);
        //dd($supplier);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success','Data Supplier Berhasil di Hapus');
    }
}
