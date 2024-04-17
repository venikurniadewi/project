<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('/soba.jpg'); /* Ganti '/soba.jpeg' dengan path relatif ke gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 600px;
            background-color: rgba(255, 255, 255, 20); /* Warna latar belakang transparan */
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            opacity: 0.9; /* Opacity konten */
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pegawai</h1>
        <p><strong>No:</strong> {{ $pegawai->no }}</p>
        <p><strong>Kode:</strong> {{ $pegawai->kode }}</p>
        <p><strong>Nama:</strong> {{ $pegawai->nama }}</p>
        <p><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</p>

        <!-- Tombol Kembali -->
        <form action="/data_karyawan" method="get">
            <button type="submit">Kembali</button>
        </form>
    </div>
</body>
</html>
