<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai Baru</title>
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
        input[type="text"],
        input[type="password"] {
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
    <!-- <label for="no">No:</label><br>
    <input type="text" id="no" name="no"><br> -->
    <label for="name">Nama:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <label for="phone_number">Nomor Telepon:</label><br>
    <input type="text" id="phone_number" name="phone_number"><br>
    <label for="job_title">Jabatan:</label><br>
    <input type="text" id="job_title" name="job_title"><br>
    <label for="address">Alamat:</label><br>
    <input type="text" id="address" name="address"><br><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>
