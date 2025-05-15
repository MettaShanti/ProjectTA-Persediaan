@extends('layouts.main')

@section('content')
<h4>Daftar Produk</h4>
<a href="{{ route('produk.create') }}" class="btn btn-primary mb-2">Tambah Produk</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
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
        @foreach($produks as $produk)
        <tr>
            <td>{{ $produk->kode_produk }}</td>
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->jenis }}</td>
            <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
            <td>{{ $produk->satuan }}</td>
            <td>{{ $produk->supplier->nama ?? '-' }}</td>
            <td>
                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus produk ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection