@extends('layouts.admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="card-title">Laporan Semua Karyawan</h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <label for="dataCount" class="mr-2">Tampilkan:</label>
                        <select id="dataCount" onchange="changeDataCount()" class="form-control">
                            <option value="5">5</option>
                            <option value="all">Semua</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="ml-auto">
                            <a href="{{ route('cetak-laporan', ['bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-secondary" style="padding: 5px 10px; margin-right: 18px; margin-top: 10px;">
                                <i class="fas fa-print"></i> &nbsp;Cetak
                            </a>
                            <a href="{{ route('generate-pdf', ['bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-primary" style="padding: 5px 10px; color: #fff; margin-right: 18px; margin-top: 10px;">
                                <i class="fas fa-file-pdf"></i> &nbsp;Export PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('laporan-karyawan') }}" method="GET" class="form-inline">
                    <label for="bulan" class="mr-2">Bulan:</label>
                    <select name="bulan" id="bulan" class="form-control mr-2">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('bulan', date('m')) == $i ? 'selected' : '' }}>{{ date("F", mktime(0, 0, 0, $i, 1)) }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('laporan-karyawan') }}" method="GET" class="form-inline justify-content-end">
                    <label for="tahun" class="mr-2">Tahun:</label>
                    <select name="tahun" id="tahun" class="form-control mr-2">
                        @for ($i = 2020; $i <= date('Y'); $i++)
                            <option value="{{ $i }}" {{ request('tahun', date('Y')) == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->name }}</td>
                            <td>{{ $laporan->job_title }}</td>
                            <!-- Menampilkan jumlah kehadiran -->
                            <td>{{ $laporan->hadir_count }}</td>
                            <!-- Menampilkan jumlah izin -->
                            <td>{{ $laporan->izin_count }}</td>
                            <!-- Tombol untuk melihat rekap -->
                            <td>
                            <a href="{{ route('lihat-rekap', ['userId' => $laporan->id, 'bulan' => $bulan, 'tahun' => $tahun]) }}" class="btn btn-primary">Lihat Rekap</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Targeting the second column (employee name)
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

    function changeDataCount() {
        var selectBox = document.getElementById("dataCount");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var table = document.querySelector("table");
        var tr = table.getElementsByTagName("tr");

        if (selectedValue === "all") {
            for (var i = 0; i < tr.length; i++) {
                tr[i].style.display = "";
            }
        } else {
            for (var i = 1; i < tr.length; i++) { // Start from index 1 to skip header row
                if (i <= 5) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function printData() {
        window.print();
    }

</script>

@endsection
