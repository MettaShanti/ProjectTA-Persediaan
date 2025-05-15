@extends('layouts.main')

@section('content')
<h4>Edit Produk</h4>

<form action="{{ route('produk.update', $produk->kode_produk) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Kode Produk</label>
    <input type="text" class="form-control mb-2" value="{{ $produk->kode_produk }}" readonly>

    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control mb-2" value="{{ old('nama_produk', $produk->nama_produk) }}">

    <label>Jenis Produk</label>
    <input type="text" name="jenis" class="form-control mb-2" value="{{ old('jenis', $produk->jenis) }}">

    <label>Harga</label>
    <input type="number" name="harga" class="form-control mb-2" value="{{ old('harga', $produk->harga) }}">

    <label>Satuan</label>
    <input type="text" name="satuan" class="form-control mb-2" value="{{ old('satuan', $produk->satuan) }}">

    <label>Supplier</label>
    <select name="supplier_id" class="form-control mb-2">
        @foreach($supplier as $item)
            <option value="{{ $item->id }}" {{ $produk->supplier_id == $item->id ? 'selected' : '' }}>
                {{ $item->nama }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary mt-2" type="submit">Simpan Perubahan</button>
</form>
@endsection
