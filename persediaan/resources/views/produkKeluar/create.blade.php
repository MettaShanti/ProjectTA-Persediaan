@extends('layouts.main')

@section('content')
<h4>Tambah Produk Keluar</h4>
<form action="{{ route('produkKeluar.store') }}" method="POST">
    @csrf

    <label>Kode Produk</label>
    @error('kode_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="kode_produk" id="kode_produk" class="form-control mb-2">
        <option value="">-- Pilih Kode Produk --</option>
        @foreach($produks as $produk)
        <option value="{{ $produk->kode_produk }}"
            data-nama="{{ $produk->nama_produk }}"
            data-id="{{ $produk->id }}"
            data-exp="{{ $produk->tgl_exp ?? '' }}"
            {{ old('kode_produk') == $produk->kode_produk ? 'selected' : '' }}>
            {{ $produk->kode_produk }}
        </option>
@endforeach
    </select>

    <label>Nama Produk</label>
    @error('nama_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="nama_produk" id="nama_produk" class="form-control mb-2" value="{{ old('nama_produk') }}" readonly>

    <input type="hidden" name="produk_id" id="produk_id" value="{{ old('produk_id') }}">

    <label>Tanggal Keluar</label>
    @error('tgl_keluar') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="date" name="tgl_keluar" class="form-control mb-2" value="{{ old('tgl_keluar') }}">

    <label>Tanggal Expired</label>
    @error('tgl_exp') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="date" name="tgl_exp" id="tgl_exp" class="form-control mb-2" value="{{ old('tgl_exp') }}">

    <label>Jumlah</label>
    @error('jumlah') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="number" name="jumlah" class="form-control mb-2" value="{{ old('jumlah') }}">

    <label>Status</label>
    @error('status') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="status" class="form-control mb-2">
        <option value="">-- Pilih Status --</option>
        <option value="Barang Sudah Expire" {{ old('status') == 'Barang Sudah Expire' ? 'selected' : '' }}>Barang Sudah Expire</option>
        <option value="Habis" {{ old('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
        <option value="Buang" {{ old('status') == 'Buang' ? 'selected' : '' }}>Buang</option>
        <option value="Terjual" {{ old('status') == 'Terjual' ? 'selected' : '' }}>Terjual</option>
    </select>

    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kodeProduk = document.getElementById('kode_produk');
    const namaProduk = document.getElementById('nama_produk');
    const produkId = document.getElementById('produk_id');
    const tglExp = document.getElementById('tgl_exp');

    function updateProdukInfo() {
        const selected = kodeProduk.options[kodeProduk.selectedIndex];
        namaProduk.value = selected.getAttribute('data-nama') || '';
        produkId.value = selected.getAttribute('data-id') || '';
        tglExp.value = selected.getAttribute('data-exp') || '';
    }

    kodeProduk.addEventListener('change', updateProdukInfo);
    updateProdukInfo(); // jalankan saat halaman dimuat
});
</script>
@endsection