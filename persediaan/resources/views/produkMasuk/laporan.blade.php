<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Produk Masuk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; margin-bottom: 0; }
        .tanggal { text-align: right; font-size: 11px; }
    </style>
</head>
<body>
    <h2>Laporan Produk Masuk</h2>
    <div class="tanggal">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Produksi</th>
                <th>Tanggal Exp</th>
                <th>Jumlah</th>
                <th>Jenis Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produkMasuk as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode_produk }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_masuk)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_produksi)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_exp)->format('d-m-Y') }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->produk->nama ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
