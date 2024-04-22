@extends('layouts.admin.dashboard')

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
                            <h3 class="card-title">Daftar Pegawai</h3>
                            <div>
                                <a href="{{ route('exportjk') }}" class="btn btn-sm btn-primary mr-2">
                                    <i class="fas fa-file-excel"></i> Export Rekap Karyawan
                                </a>
                                <!-- <button class="btn btn-sm btn-success" id="btn-add-new" type="button" data-toggle="modal" data-target="#modalTambahKaryawan">
                                    <i class="fas fa-plus"></i> Tambah Pegawai
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through your data here to display all employees -->
                                    @foreach($pegawai as $key => $item)
                                    <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->job_title }}</td>
                                    <td>{{ $item->address }}</td>
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
@endsection
