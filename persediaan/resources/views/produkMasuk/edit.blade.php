@extends('layouts.main')

@section('content')
<h4>Edit Produk Masuk</h4>

<form action="{{ route('produkMasuk.update', $produkMasuk->id) }}" method="post">
    @csrf
    @method('PUT') 

    <label>Nama Produk</label>
   <select name="produk_id" class="form-control">
    @foreach ($produk as $item)
        <option value="{{ $item->id }}" {{ $item->id == $produkMasuk->produk_id ? 'selected' : '' }}>
            {{ $item->nama_produk }}
        </option>
    @endforeach
</select>

    <label>Tanggal Masuk Produk</label>
    @error('tgl_masuk')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_masuk" class="form-control mb-2" value="{{ old('tgl_masuk', $produkMasuk->tgl_masuk) }}">

    <label>Tanggal Produksi</label>
    @error('tgl_produksi')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_produksi" class="form-control mb-2" value="{{ old('tgl_produksi', $produkMasuk->tgl_produksi) }}">

    <label>Tanggal Expiret</label>
    @error('tgl_exp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="date" name="tgl_exp" class="form-control mb-2" value="{{ old('tgl_exp', $produkMasuk->tgl_exp) }}">

    <label>Jumlah</label>
    @error('jumlah')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="jumlah" class="form-control mb-2" value="{{ old('jumlah', $produkMasuk->jumlah) }}">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
