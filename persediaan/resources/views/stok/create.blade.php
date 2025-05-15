@extends('layouts.main')

@section('content')
<h4>Divisi</h4>
<form action="{{ route('stok.store')}}" method="post">
    @csrf

    Nama
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="number" name="nama" id="" class="form-control mb-2">
    
    Alamat 
    @error('alamat')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="alamat" id="" class="form-control mb-2">
    
    Nomor Telphon
    @error('nohp')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="text" name="nohp" id="" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
