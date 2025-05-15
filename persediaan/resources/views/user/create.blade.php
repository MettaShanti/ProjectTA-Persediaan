
@extends('layouts.main')

@section('content')
<h4>Tambah Data Produk</h4>
<form action="{{ route('produk.store') }}" method="post">
    @csrf

    <label>Nama Produk</label>
    @error('nama_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="nama_produk" class="form-control mb-2" value="{{ old('nama_produk') }}" required>

    <label>Jenis</label>
    @error('jenis') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="jenis" class="form-control mb-2" value="{{ old('jenis') }}" required>

    <label>Harga</label>
    @error('harga') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="number" name="harga" class="form-control mb-2" value="{{ old('harga') }}" required>

    <label>Satuan</label>
    @error('satuan') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="satuan" class="form-control mb-2" value="{{ old('satuan') }}" required>

    <label>Supplier</label>
    @error('supplier_id') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="supplier_id" class="form-control mb-2" required>
        <option value="">Pilih Supplier</option>
        @foreach ($supplier as $item)
            <option value="{{ $item->id }}" {{ old('supplier_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection