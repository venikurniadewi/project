<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai Baru</title>
    <!-- Tambahkan CSS Anda di sini -->
</head>
<body>
    <h1>Tambah Pegawai Baru</h1>
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <label for="no">No:</label><br>
        <input type="text" id="no" name="no"><br>
        <label for="kode">Kode:</label><br>
        <input type="text" id="kode" name="kode"><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan"><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
