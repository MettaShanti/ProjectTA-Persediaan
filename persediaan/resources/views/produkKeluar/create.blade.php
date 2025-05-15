@extends('layouts.main')

@section('content')
<h4>Tambah Produk Masuk</h4>
<form action="{{ route('produkKeluar.store')}}" method="POST">
    @csrf

    <label>Nama Produk</label>
    @error('Produk_id')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <select name="Produk_id" class="form-control">
        @foreach ($produk as $item)
            <option value="{{ $item->id }}" {{ $item->id == $produkKeluar->Produk_id ? 'selected' : '' }}>
                {{ $item->nama_produk }}
            </option>
        @endforeach
    </select>

    <label>Tanggal Keluar Produk</label>
    @error('tgl_keluar')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_keluar" class="form-control mb-2">

    <label>Tanggal Expiret</label>
    @error('tgl_exp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_exp" class="form-control mb-2">

    <label>Jumlah</label>
    @error('jumlah')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="jumlah" class="form-control mb-2">

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
