@extends('layouts.main')

@section('content')
<h4>Edit Produk Masuk</h4>
<form action="{{ route('produkMasuk.update', $produkMasuk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Kode Produk</label>
    @error('kode_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="kode_produk" class="form-control mb-2" value="{{ old('kode_produk', $produkMasuk->kode_produk) }}">

    <label>Nama Produk</label>
    @error('nama_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="nama_produk" class="form-control mb-2" value="{{ old('nama_produk', $produkMasuk->nama_produk) }}">

    <label>Tanggal Masuk</label>
    @error('tgl_masuk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="date" name="tgl_masuk" class="form-control mb-2" value="{{ old('tgl_masuk', $produkMasuk->tgl_masuk) }}">

    <label>Tanggal Produksi</label>
    @error('tgl_produksi') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="date" name="tgl_produksi" class="form-control mb-2" value="{{ old('tgl_produksi', $produkMasuk->tgl_produksi) }}">

    <label>Tanggal Expired</label>
    @error('tgl_exp') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="date" name="tgl_exp" class="form-control mb-2" value="{{ old('tgl_exp', $produkMasuk->tgl_exp) }}">

    <label>Jumlah</label>
    @error('jumlah') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="number" name="jumlah" class="form-control mb-2" value="{{ old('jumlah', $produkMasuk->jumlah) }}">

    <label>Pilih Produk</label>
    @error('produk_id') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="produk_id" class="form-control mb-2">
        <option value="">-- Pilih Produk --</option>
        @foreach($produks as $produk)
            <option value="{{ $produk->id }}" {{ old('produk_id', $produkMasuk->produk_id) == $produk->id ? 'selected' : '' }}>
                {{ $produk->nama_produk }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@endsection
