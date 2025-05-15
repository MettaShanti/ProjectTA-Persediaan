@extends('layouts.main')

@section('content')
<h4>Edit Produk Keluar</h4>
<form action="{{ route('produkKeluar.update', $produkKeluar['id']) }}" method="post">
    @csrf
    @method('PUT') 

    <label>Nama Produk</label>
    @error('Produk_id')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <select name="Produk_id" class="form-control">
        @foreach ($produk as $item)
            <option value="{{ $item->id }}" {{ $item->id == $produk->Produk_id ? 'selected' : '' }}>
                {{ $item->nama_produk }}
            </option>
        @endforeach
    </select>

    <label>Tanggal Keluar Produk</label>
    @error('tgl_masuk')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_keluar" class="form-control mb-2" value="{{ $produkKeluar['tgl_keluar']}}">

    <!-- <label>Tanggal Produksi</label>
    @error('tgl_produksi')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_produksi" class="form-control mb-2" value="{{ $produkKeluar['tgl_produksi']}}"> -->

    <label>Tanggal Expiret</label>
    @error('tgl_exp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_exp" class="form-control mb-2" value="{{ $produkKeluar['tgl_exp']}}">

    <label>Jumlah</label>
    @error('jumlah')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="jumlah" class="form-control mb-2" value="{{ $produkKeluar['jumlah']}}">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection