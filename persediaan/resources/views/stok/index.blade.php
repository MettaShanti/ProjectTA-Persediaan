@extends('layouts.main')

@section('content')
<h4>Daftar Stok</h4>
<a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">TAMBAH</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>tgl_produksi</th>
                <th>tgl_exp</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stok as $row)
            <tr>
                <td>{{ $row->nama_produk}}</td>
                <td>{{ $row->tgl_produksi}}</td>
                <td>{{ $row->tgl_exp}}</td>
                <td>{{ $row->harga}}</td>
                <td>{{ $row->stok}}</td>
                <td>{{ $row->satuan}}</td>
                <td>{{ $row['produk']['nama']}}</td>
                <td>{{ $row['produkMasuk']['nama']}}</td>
                <td>{{ $row['produkKeluar']['nama']}}</td>
                <td>
                    <a href="{{ route('produk.edit', $row->id) }}" class="btn btn-warning btn-sm">UBAH</a>
                    <form action="{{ route('produk.destroy', $row->id) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin hapus data ini?')">HAPUS</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection