<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data Karyawan</title>
    <style>
        /* Atur gaya untuk tampilan PDF di sini */
        body {
            font-family: Arial, sans-serif;
        }
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
    <h2>Data Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $key => $pegawai)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pegawai->kode }}</td>
                <td>{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->jabatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
