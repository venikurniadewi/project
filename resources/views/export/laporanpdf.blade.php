<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan PDF</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Hadir</th>
                <th>Izin</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporan->name }}</td>
                    <td>{{ $laporan->job_title }}</td>
                    <!-- Menampilkan jumlah kehadiran -->
                    <td>{{ $laporan->hadir_count }}</td>
                    <!-- Menampilkan jumlah izin -->
                    <td>{{ $laporan->izin_count }}</td>
                    <!-- Tombol untuk melihat rekap -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
