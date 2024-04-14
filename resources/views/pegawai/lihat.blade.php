<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <!-- Tambahkan CSS Anda di sini -->
</head>
<body>
    <h1>Detail Pegawai</h1>
    <p><strong>No:</strong> {{ $pegawai->no }}</p>
    <p><strong>Kode:</strong> {{ $pegawai->kode }}</p>
    <p><strong>Nama:</strong> {{ $pegawai->nama }}</p>
    <p><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</p>
</body>
</html>
