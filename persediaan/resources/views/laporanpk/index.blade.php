@extends('layouts.main')

@section('content')
<h4>Laporan Produk Keluar</h4>

<form method="GET" action="{{ route('laporanpk.index') }}" class="row align-items-end mb-3" style="max-width: 600px;">
    <div class="col-4">
        <label for="tanggal_awal" class="form-label mb-1" style="font-size: 0.9rem;">Tanggal Awal</label>
        <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control form-control-sm" value="{{ request('tanggal_awal') }}">
    </div>
    <div class="col-4">
        <label for="tanggal_akhir" class="form-label mb-1" style="font-size: 0.9rem;">Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control form-control-sm" value="{{ request('tanggal_akhir') }}">
    </div>
    <div class="col-2 d-grid">
        <button type="submit" class="btn btn-primary btn-sm mt-3 w-100">Filter</button>
    </div>
    <div class="col-2 d-grid">
        <a href="{{ route('laporanpm.cetak', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}" class="btn btn-success btn-sm mt-3 w-100" target="_blank">Cetak</a>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Produksi</th>
                <th>Tanggal Expire</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produkKeluar as $pk)
            <tr>
                <td>{{ $pm->kode_produk }}</td>
                <td>{{ $pm->nama_produk }}</td>
                <td>{{ $pm->tgl_masuk }}</td>
                <td>{{ $pm->tgl_produksi }}</td>
                <td>{{ $pm->tgl_exp }}</td>
                <td>{{ $pm->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection