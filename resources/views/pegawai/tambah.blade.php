<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai Baru</title>
<<<<<<< HEAD
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

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <h1>Tambah Pegawai Baru</h1>
=======
    <!-- Tambahkan CSS Anda di sini -->
</head>
<body>
    <h1>Tambah Pegawai Baru</h1>
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
>>>>>>> ef307086c28b3681248d071ecfaa740ded6e1126
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
