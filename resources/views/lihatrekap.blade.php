@extends('layouts.admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Rekap Absensi - {{ $user->name }}</h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <div class="card-header-right">
            <div class="ml-auto">
                <!-- Tombol Filter -->
                <form action="{{ route('lihat-rekap', ['userId' => $user->id]) }}" method="GET" class="form-inline">
                    <!-- Tambahkan filter jika diperlukan -->
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

                <!-- Tombol Cetak -->
                <a href="{{ route('cetak-pegawai', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-secondary mr-2">
                    <i class="fas fa-print"></i> Cetak
                </a>

                <!-- Tombol Export PDF -->
                <a href="{{ route('pegawai-pdf', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <!-- Tabel Kehadiran -->
            <h4>Kehadiran:</h4>
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

        <div class="table-responsive">
            <!-- Tabel Izin -->
            <h4>Izin:</h4>
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

<!-- Tombol untuk kembali ke laporan.blade.php -->
<div class="mt-3">
    <a href="{{ route('laporan-karyawan') }}" class="btn btn-primary">Kembali ke Laporan</a>
</div>

@endsection
