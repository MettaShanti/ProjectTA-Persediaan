@extends('layouts.main')

@section('content')
<h4>Daftar Supplier</h4>
<a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">TAMBAH</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $row)
            <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->nohp }}</td>
                <td>
                    <a href="{{ route('supplier.edit', $row->id) }}" class="btn btn-warning btn-sm">UBAH</a>
                    <form action="{{ route('supplier.destroy', $row->id) }}" method="post" style="display:inline">
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