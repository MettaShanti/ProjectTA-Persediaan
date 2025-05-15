
@extends('layouts.main')

@section('content')
<h4>Edit Data Produk</h4>
<form action="{{ route('produk.update', $produk->kode_produk) }}" method="post">
    @csrf
    @method('PUT')

    <label>Nama Produk</label>
    @error('nama_produk') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="nama_produk" class="form-control mb-2" value="{{ old('nama_produk', $produk->nama_produk) }}" required>

    <label>Jenis</label>
    @error('jenis') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="jenis" class="form-control mb-2" value="{{ old('jenis', $produk->jenis) }}" required>

    <label>Harga</label>
    @error('harga') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="number" name="harga" class="form-control mb-2" value="{{ old('harga', $produk->harga) }}" required>

    <label>Satuan</label>
    @error('satuan') <span class="text-danger">({{ $message }})</span> @enderror
    <input type="text" name="satuan" class="form-control mb-2" value="{{ old('satuan', $produk->satuan) }}" required>

    <label>Supplier</label>
    @error('supplier_id') <span class="text-danger">({{ $message }})</span> @enderror
    <select name="supplier_id" class="form-control mb-2" required>
        <option value="">Pilih Supplier</option>
        @foreach ($supplier as $item)
            <option value="{{ $item->id }}" {{ old('supplier_id', $produk->supplier_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection