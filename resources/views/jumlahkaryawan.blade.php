@extends('layouts.admin.dashboard')
@php
    $title = 'Karyawan';
@endphp

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar {{$title}}</h3>
                            <div>
                                <button class="btn btn-sm btn-primary mr-2" id="btn-export" data-toggle="modal" data-target="#modalExportRekap">
                                    <i class="fas fa-file-excel"></i>
                                    Export Rekap Karyawan
                                </button>
                                <button class="btn btn-sm btn-success" id="btn-add-new" type="button" data-toggle="modal" data-target="#modalTambahKaryawan">
                                    <i class="fas fa-plus"></i>
                                    Tambah {{$title}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <!-- Tambahkan tombol untuk opsi, misalnya: edit, hapus, dll -->
                                            <!-- Contoh tombol edit -->
                                            <button class="btn btn-sm btn-primary" data-id="" data-nik="" data-nama="" data-email="" data-kecamatan="" data-desa="" data-toggle="modal" data-target="#modalEditAdminDesa">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                            <!-- Contoh tombol hapus -->
                                            <button class="btn btn-sm btn-danger" data-id="" data-toggle="modal" data-target="#modalHapusAdminDesa">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Karyawan -->
<div class="modal fade" id="modalTambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKaryawanLabel">Tambah {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="inputNo">No</label>
                        <input type="text" class="form-control" id="inputNo" placeholder="Masukkan No">
                    </div>
                    <div class="form-group">
                        <label for="inputID">ID</label>
                        <input type="text" class="form-control" id="inputID" placeholder="Masukkan ID">
                    </div>
                    <div class="form-group">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="inputJabatan">Jabatan</label>
                        <input type="text" class="form-control" id="inputJabatan" placeholder="Masukkan Jabatan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Export Rekap Karyawan -->
<div class="modal fade" id="modalExportRekap" tabindex="-1" role="dialog" aria-labelledby="modalExportRekapLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExportRekapLabel">Export Rekap Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi modal untuk pilihan ekspor rekap karyawan di sini -->
                <p>Pilihan ekspor rekap karyawan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- Tambahkan tombol untuk mengekspor rekap karyawan di sini -->
                <button type="button" class="btn btn-primary">Export</button>
            </div>
        </div>
    </div>
</div>

@endsection