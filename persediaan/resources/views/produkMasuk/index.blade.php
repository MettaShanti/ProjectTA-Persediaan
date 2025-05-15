@extends('layouts.main')

@section('content')
<h4>Daftar Produk Masuk</h4>
<a href="{{ route('produkMasuk.create') }}" class="btn btn-primary mb-3">TAMBAH</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Tanggal Produk Masuk</th>
                <th>Tanggal Produksi</th>
                <th>Tanggal Expiret</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produkMasuk as $row)
        <tr>
            <td>{{ isset($row['produk']) ? $row['produk']['kode_produk'] : '-' }}</td>
            <td>{{ $row['nama_produk'] }}</td>
            <td>{{ $row['tgl_masuk'] }}</td>
            <td>{{ $row['tgl_produksi'] }}</td>
            <td>{{ $row['tgl_exp'] }}</td>
            <td>{{ $row['jumlah'] }}</td>
            <td>
            <a href="{{ route('produkMasuk.edit', $row->id) }}" class="btn btn-warning btn-sm">UBAH</a>
            <form action="{{ route('produkMasuk.destroy', $row->id) }}" method="POST" style="display:inline">
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