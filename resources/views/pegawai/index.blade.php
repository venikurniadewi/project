@extends('layouts.admin.dashboard')

@php
    $title = 'Karyawan';
@endphp

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <!-- Tambahkan link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Tambahkan CSS Anda di sini -->
    <link rel="stylesheet" href="{{ asset('tabler/css/dk-ds.css') }}"> <!-- Ganti 'css/dk-ds.css' dengan path yang sesuai dengan lokasi file CSS Anda -->
</head>

<body>
    <h1>Data Pegawai</h1>
    <a href="{{ route('pegawai.tambah') }}" class="btn-add"><i class="fas fa-user-plus"></i> Tambah Baru</a>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cari...">
        <button onclick="searchTable()"><i class="fas fa-search"></i></button>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through your data here to display all employees -->
            @foreach($pegawai as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan }}</td>
                <td class="action-buttons">
                    <a href="{{ route('pegawai.lihat', ['id' => $item->id]) }}" class="btn-green"><i class="fas fa-eye"></i> Lihat</a>
                    <a href="{{ route('pegawai.edit', ['id' => $item->id]) }}" class="btn-orange"><i class="fas fa-edit"></i> Edit</a>
                    <form action="{{ route('pegawai.hapus', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-red"><i class="fas fa-trash-alt"></i> Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- JavaScript untuk meng-handle pencarian -->
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Ubah nomor sesuai dengan kolom yang ingin Anda cari
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>

@endsection
