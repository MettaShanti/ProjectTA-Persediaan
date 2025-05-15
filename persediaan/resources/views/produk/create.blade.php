@extends('layouts.main')

@section('content')
<h4>Tambah Produk</h4>
<form action="{{ route('produk.store') }}" method="POST">
    @csrf

    <label>Nama Produk</label>
    @error('nama_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="nama_produk" class="form-control mb-2" value="{{ old('nama_produk') }}">

    <label>Jenis</label>
    @error('jenis') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="jenis" class="form-control mb-2" value="{{ old('jenis') }}">

    <label>Harga</label>
    @error('harga') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="number" name="harga" class="form-control mb-2" value="{{ old('harga') }}">

    <label>Satuan</label>
    @error('satuan') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="satuan" class="form-control mb-2" value="{{ old('satuan') }}">

    <label>Supplier</label>
    @error('supplier_id') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="supplier_id" class="form-control mb-2">
        <option value="">-- Pilih Supplier --</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                {{ $supplier->nama }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>
@endsection