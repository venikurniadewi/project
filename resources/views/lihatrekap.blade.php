@extends('layouts.admin.dashboard')

@section('content')

<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Rekap Absensi - {{ $user->name }}</h3>
        <div class="card-header-right">
            <div class="ml-auto no-print">
                <form action="{{ route('lihat-rekap', ['userId' => $user->id]) }}" method="GET" class="form-inline">
                    <!-- <label for="bulan" class="mr-2">Bulan:</label>
                    <select name="bulan" id="bulan" class="form-control mr-2">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ date('m') == $i ? 'selected' : '' }}>
                                {{ date("F", mktime(0, 0, 0, $i, 1)) }}
                            </option>
                        @endfor
                    </select>

                    <label for="tahun" class="mr-2">Tahun:</label>
                    <select name="tahun" id="tahun" class="form-control mr-2">
                        @for ($i = 2020; $i <= date('Y'); $i++)
                            <option value="{{ $i }}" {{ date('Y') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button> -->
                    
                </form>
                
                <a href="{{ route('cetak-pegawai', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-secondary" style="padding: 5px 10px; margin-right: 18px; margin-top: 10px;">
    <i class="fas fa-print"></i> &nbsp;Cetak
</a>

<a href="{{ route('pegawai-pdf', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-primary" style="padding: 5px 10px; color: #fff; margin-right: 18px; margin-top: 10px;">
    <i class="fas fa-file-pdf"></i> &nbsp;Export PDF
</a>

</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <h4>Kehadiran:</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapAbsensi as $absensi)
                    <tr>
                        <td>{{ $absensi->tanggal }}</td>
                        <td>{{ $absensi->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <h4>Izin:</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Alasan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapIzin as $izin)
                    <tr>
                        <td>{{ $izin->tanggal }}</td>
                        <td>{{ $izin->alasan }}</td>
                        <td>{{ $izin->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button to navigate back to laporan.blade.php -->
<div class="mt-3 no-print">
    <a href="{{ route('laporan-karyawan') }}" class="btn btn-primary">Kembali ke Laporan</a>
</div>

@endsection
