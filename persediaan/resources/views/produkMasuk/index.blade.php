@extends('layouts.main')

@section('content')
<h4>Daftar Produk Masuk</h4>
<a href="{{ route('produkMasuk.create') }}" class="btn btn-primary mb-2">Tambah Produk Masuk</a>
<a href="{{ route('produkMasuk.cetak') }}" class="btn btn-primary" target="_blank">Cetak PDF</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Produksi</th>
                <th>Tanggal Expire</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
    </thead>
    <tbody>
        @foreach($produkMasuk as $pm)
        <tr>
            <td>{{ $pm->kode_produk }}</td>
            <td>{{ $pm->nama_produk }}</td>
            <td>{{ $pm->tgl_masuk }}</td>
            <td>{{ $pm->tgl_produksi }}</td>
            <td>{{ $pm->tgl_exp }}</td>
            <td>{{ $pm->jumlah }}</td>
            <td>
                <a href="{{ route('produkMasuk.edit', $pm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('produkMasuk.destroy', $pm->id) }}" method="POST" style="display:inline;">
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