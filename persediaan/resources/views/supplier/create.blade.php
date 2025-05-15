@extends('layouts.main')

@section('content')
<h4>Tambah Data Supplier</h4>
<form action="{{ route('supplier.store')}}" method="post">
    @csrf

    Nama Supplier
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nama" id="" class="form-control mb-2">
    
    Alamat 
    @error('alamat')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="alamat" id="" class="form-control mb-2">
    
    NO Telephon
    @error('nohp')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="nohp" id="" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
