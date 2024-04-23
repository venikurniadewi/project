@extends('layouts.admin.dashboard')

@php
    $title = 'Karyawan';
@endphp

@section('content')

<div class="d-flex justify-content-between align-items-center mt-3 mb-3">
    <ul>
        <a type="button" href="{{ route('pegawai.tambah') }}" class="btn btn-primary" style="padding: 5px 10px; color: #fff; margin-right: 18px; margin-top: 10px;" onclick="togglePopup()">
            <i class="fas fa-plus"></i> &nbsp;Tambah Akun Karyawan
        </a>
    </ul>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="card-title">Data Profile Karyawan</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <tr>
                                        <th class="text-left">No</th>
                                        <th class="text-left">Nama Pegawai</th>
                                        <th class="text-left">Email</th>
                                        <th class="text-left">Password</th>
                                        <th class="text-left">Nomor Telepon</th>
                                        <th class="text-left">Jabatan</th>
                                        <th class="text-left">Alamat</th>
                                        <th class="text-right">Aksi</th> 
                                        <!-- Tambahkan class "text-right" untuk menggeser ke kanan -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through your data here to display all employees -->
                                    @foreach($pegawai as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->job_title }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td class="action-buttons text-right"> <!-- Tambahkan class "text-right" untuk menggeser ke kanan -->
                                            <a href="{{ route('pegawai.show', ['id' => $item->id]) }}" class="btn-green"><i class="fas fa-eye"></i> Lihat</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript untuk meng-handle pencarian -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Tambahkan CSS Anda di sini -->
    <link rel="stylesheet" href="{{ asset('tabler/css/dk-ds.css') }}"> <!-- Ganti 'css/dk-ds.css' dengan path yang sesuai dengan lokasi file CSS Anda -->
    
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

@endsection
