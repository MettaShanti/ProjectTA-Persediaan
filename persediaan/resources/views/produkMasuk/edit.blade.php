@extends('layouts.main')

@section('content')
<h4>Edit Produk Masuk</h4>
<form action="{{ route('produkMasuk.update', $produkMasuk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Kode Produk</label>
    @error('kode_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="kode_produk" id="kode_produk" class="form-control mb-2">
        <option value="">-- Pilih Kode Produk --</option>
        @foreach($produks as $produk)
            <option value="{{ $produk->kode_produk }}"
                data-nama="{{ $produk->nama_produk }}"
                data-id="{{ $produk->id }}"
                {{ old('kode_produk', $produkMasuk->kode_produk) == $produk->kode_produk ? 'selected' : '' }}>
                {{ $produk->kode_produk }}
            </option>
        @endforeach
    </select>

    <label>Nama Produk</label>
    @error('nama_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="nama_produk" id="nama_produk" class="form-control mb-2" value="{{ old('nama_produk', $produkMasuk->nama_produk) }}" readonly>

    <input type="hidden" name="produk_id" id="produk_id" value="{{ old('produk_id', $produkMasuk->produk_id) }}">

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

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kodeProduk = document.getElementById('kode_produk');
    const namaProduk = document.getElementById('nama_produk');
    const produkId = document.getElementById('produk_id');

    function updateProdukInfo() {
        const selected = kodeProduk.options[kodeProduk.selectedIndex];
        namaProduk.value = selected.getAttribute('data-nama') || '';
        produkId.value = selected.getAttribute('data-id') || '';
    }

    kodeProduk.addEventListener('change', updateProdukInfo);
    updateProdukInfo(); // jalankan saat halaman dimuat
});
</script>
@endsection