@extends('layouts.main')

@section('content')
<h4>Divisi</h4>
<form action="{{ route('supplier.update', $supplier['id'])}}" method="post">
    @csrf
    @method('PUT')
    Nama Supplier
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="nama" id="" class="form-control mb-2" value="{{ $supplier['nama']}}">
    
    Alamat 
    @error('alamat')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="alamat" id="" class="form-control mb-2" value="{{ $supplier['alamat']}}">
    
    Nomor Telphon
    @error('nohp')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="number" name="nohp" id="" class="form-control mb-2" value="{{ $supplier['nohp']}}">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
