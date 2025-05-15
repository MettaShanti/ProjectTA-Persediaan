@extends('layouts.main')

@section('content')
<h4>Daftar Produk Keluar</h4>
<a href="{{ route('produkKeluar.create') }}" class="btn btn-primary mb-2">Tambah Produk Keluar</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Tanggal Keluar</th>
                <th>Tanggal Expired</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    </thead>
    <tbody>
        @foreach($produkKeluars as $pk)
        <tr>
            <td>{{ $pk->kode_produk }}</td>
            <td>{{ $pk->nama_produk }}</td>
            <td>{{ $pk->tgl_keluar }}</td>
            <td>{{ $pk->tgl_exp }}</td>
            <td>{{ $pk->jumlah }}</td>
            <td>{{ $pk->status }}</td>
            <td>
                <a href="{{ route('produkKeluar.edit', $pk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('produkKeluar.destroy', $pk->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection