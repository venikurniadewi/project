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

<!-- Bagian baru untuk tampilan rekap absen -->
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="page-title">
                    Laporan Presensi
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/presensi/export/pdf" id="frmLaporanPDF" target="_blank" method="POST">
                            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="bulan" id="bulan" class="form-select">
                                            <option value="">Bulan</option>
                                            <option value="1" >Januari</option>
                                            <option value="2" >Februari</option>
                                            <option value="3" >Maret</option>
                                            <option value="4" selected>April</option>
                                            <option value="5" >Mei</option>
                                            <option value="6" >Juni</option>
                                            <option value="7" >Juli</option>
                                            <option value="8" >Agustus</option>
                                            <option value="9" >September</option>
                                            <option value="10" >Oktober</option>
                                            <option value="11" >November</option>
                                            <option value="12" >Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="tahun" id="tahun" class="form-select">
                                            <option value="">Tahun</option>
                                            <option value="2022" >2022</option>
                                            <option value="2023" >2023</option>
                                            <option value="2024" selected>2024</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="nik" id="nik" class="form-select">
                                            <option value="">Pilih Karyawan</option>
                                            <option value="22-01">Veni Kurnia</option>
                                            <option value="3636">Aldo Bagas</option>
                                            <option value="687999">Husnul Putri</option>
                                            <option value="2501">Anang Prayoga</option>
                                            <option value="9999">Lailatul</option>
                                            <option value="99-99">Dedy</option>
                                            <option value="12345">Fitriani Nurhidayah</option>
                                            <option value="8888">Hilman Firdaus</option>
                                            <option value="10-10">Mimin</option>
                                            <option value="12347">Qiana</option>
                                            <option value="12349">Wahyudi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" name="cetak" class="btn btn-primary w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"></path>
                                            </svg>
                                            Cetak
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" name="exportexcel" formaction="/presensi/export/excel" class="btn btn-success w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                <path d="M7 11l5 5l5 -5"></path>
                                                <path d="M12 4l0 12"></path>
                                            </svg>
                                            Export to Excel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
