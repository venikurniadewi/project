<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi - {{ $user->name }}</title>
</head>
<body>

<div class="rekap-container">
    <h2>Rekap Absensi - {{ $user->name }}</h2>

    <h4>Kehadiran:</h4>
    <table border="1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapAbsensi as $absensi)
            <tr>
                <td>{{ $absensi->tanggal }}</td>
                <td>{{ $absensi->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h4>Izin:</h4>
    <table border="1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Alasan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapIzin as $izin)
            <tr>
                <td>{{ $izin->tanggal }}</td>
                <td>{{ $izin->alasan }}</td>
                <td>{{ $izin->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
