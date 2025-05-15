
@extends('layouts.main')

@section('content')
<h4>Daftar Produk</h4>
<a href="{{ route('produk.create') }}" class="btn btn-primary mb-2">Tambah Produk</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $item)
        <tr>
            <td>{{ $item->kode_produk }}</td>
            <td>{{ $item->nama_produk }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->supplier->nama ?? '-' }}</td>
            <td>
                <a href="{{ route('produk.edit', $item->kode_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('produk.destroy', $item->kode_produk) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection