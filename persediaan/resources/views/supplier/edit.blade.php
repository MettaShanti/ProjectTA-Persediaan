@extends('layouts.main')

@section('content')
<h4>Edit Data Supplier</h4>
<form action="{{ route('supplier.update', $supplier->id) }}" method="post">
    @csrf
    @method('PUT')

    <label>Nama</label>
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nama" class="form-control mb-2" value="{{ $supplier->nama }}">

    <label>Alamat</label>
    @error('alamat')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="alamat" class="form-control mb-2" value="{{ $supplier->alamat }}">

    <label>No HP</label>
    @error('nohp')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nohp" class="form-control mb-2" value="{{ $supplier->nohp }}">

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
