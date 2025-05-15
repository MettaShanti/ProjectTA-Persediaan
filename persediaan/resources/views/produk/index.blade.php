@extends('layouts.main')

@section('content')
<h4>Daftar Produk</h4>
<a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">TAMBAH PRODUK</a>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $row)
            <tr>
                <td>{{ $row->kode_produk ?? N/A }}</td>
                <td>{{ $row->nama_produk }}</td>
                <td>{{ $row->jenis }}</td>
                <td>Rp{{ number_format($row->harga, 0, ',', '.') }}</td>
                <td>{{ $row->satuan }}</td>
                <td>{{ $row->supplier->nama ?? '-' }}</td>
                <<td>
    <a href="{{ route('produk.edit', $row->kode_produk) }}">Edit</a>
    <form action="{{ route('produk.destroy', $row->kode_produk) }}" method="POST" style="display:inline;">
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
