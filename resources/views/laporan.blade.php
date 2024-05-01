@extends('layouts.admin.dashboard')

@php
    $title = 'Semua Karyawan';
@endphp

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan {{ $title }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('laporan-karyawan') }}" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status_presensi">Status Presensi:</label>
                        <select name="status_presensi" id="status_presensi" class="form-control">
                            <option value="">Semua</option>
                            <option value="tepat_waktu" {{ request('status_presensi') == 'tepat_waktu' ? 'selected' : '' }}>Tepat Waktu</option>
                            <option value="terlambat" {{ request('status_presensi') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jenis_izin">Jenis Izin:</label>
                        <select name="jenis_izin" id="jenis_izin" class="form-control">
                            <option value="">Semua</option>
                            <option value="sakit" {{ request('jenis_izin') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="keperluan" {{ request('jenis_izin') == 'keperluan' ? 'selected' : '' }}>Keperluan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal:</label>
                        <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status Presensi</th>
                        <th>Jenis Izin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $data)
                    <tr>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $data->status_presensi)) }}</td>
                        <td>{{ $data->izin ? ucfirst($data->izin->jenis_izin) : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
