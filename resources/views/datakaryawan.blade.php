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
    <title>Data Karyawan</title>
    <!-- Tambahkan link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('tabler/css/dk-ds.css') }}">
</head>
<body>
    <h1>Data Karyawan
        <!-- Tombol Tambah Baru -->
        <button class="btn-add" onclick="tambahKaryawan()"><i class="fas fa-user-plus"></i> Tambah Baru</button>
    </h1>
    <!-- Kotak pencarian -->
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cari...">
        <button onclick="searchTable()"><i class="fas fa-search"></i></button>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>001</td>
                <td>John Doe</td>
                <td>Manager</td>
                <td class="action-buttons">
                    <button class="btn-green" onclick="lihatKaryawan(1)"><i class="fas fa-eye"></i><span class="action-description">Lihat</span></button>
                    <button class="btn-orange" onclick="editKaryawan(1)"><i class="fas fa-edit"></i><span class="action-description">Edit</span></button>
                    <button class="btn-red" onclick="hapusKaryawan(1)"><i class="fas fa-trash-alt"></i><span class="action-description">Hapus</span></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>002</td>
                <td>Jane Smith</td>
                <td>Staff</td>
                <td class="action-buttons">
                    <button class="btn-green" onclick="lihatKaryawan(2)"><i class="fas fa-eye"></i><span class="action-description">Lihat</span></button>
                    <button class="btn-orange" onclick="editKaryawan(2)"><i class="fas fa-edit"></i><span class="action-description">Edit</span></button>
                    <button class="btn-red" onclick="hapusKaryawan(2)"><i class="fas fa-trash-alt"></i><span class="action-description">Hapus</span></button>
                </td>
            </tr>
            <!-- Data karyawan lainnya ditambahkan di sini -->
        </tbody>
    </table>

    <!-- JavaScript untuk meng-handle CRUD actions, pencarian, dan penambahan karyawan -->
    <script>
        function lihatKaryawan(id) {
            // Logika untuk melihat karyawan dengan id tertentu
            console.log("Melihat karyawan dengan ID:", id);
        }

        function editKaryawan(id) {
            // Logika untuk mengedit karyawan dengan id tertentu
            console.log("Mengedit karyawan dengan ID:", id);
        }

        function hapusKaryawan(id) {
            // Logika untuk menghapus karyawan dengan id tertentu
            console.log("Menghapus karyawan dengan ID:", id);
        }

        function tambahKaryawan() {
            // Logika untuk menambahkan karyawan baru
            console.log("Menambahkan karyawan baru");
        }

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
