<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Bantuan Sosial</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h3 { text-align: center; margin-bottom: 0; }
    </style>
</head>
<body>
    <h3>Laporan Bantuan Sosial</h3>
    <p>Jenis Bantuan: {{ request('jenis') ?? 'Semua' }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Jenis Bantuan</th>
                <th>Tanggal Terima</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->jenis_bantuan }}</td>
                <td>{{ $item->tanggal_terima }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
