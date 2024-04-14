<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <!-- Tambahkan CSS Anda di sini -->
</head>
<body>
    <h1>Edit Pegawai</h1>
    <form action="{{ route('pegawai.update', ['id' => $pegawai->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="no">No:</label><br>
        <input type="text" id="no" name="no" value="{{ $pegawai->no }}"><br>
        <label for="kode">Kode:</label><br>
        <input type="text" id="kode" name="kode" value="{{ $pegawai->kode }}"><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ $pegawai->nama }}"><br>
        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan" value="{{ $pegawai->jabatan }}"><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
