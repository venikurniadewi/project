<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/soba.jpg'); /* Ganti '/soba.jpg' dengan path relatif ke gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang transparan */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        label,
        input[type="text"] {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px;
            text-align: left;
        }

        button[type="submit"],
        button[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 10px;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="{{ route('pegawai.update', ['id' => $pegawai->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Pegawai</h1>
        <label for="no">No:</label>
        <input type="text" id="no" name="no" value="{{ $pegawai->no }}"><br>
        <label for="kode">Kode:</label>
        <input type="text" id="kode" name="kode" value="{{ $pegawai->kode }}"><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ $pegawai->nama }}"><br>
        <label for="jabatan">Jabatan:</label>
        <input type="text" id="jabatan" name="jabatan" value="{{ $pegawai->jabatan }}"><br><br>
        <button type="submit">Simpan Perubahan</button>
        <a href="/data_karyawan"><button type="button">Batal</button></a>
    </form>
</body>
</html>
