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
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through your data here to display all employees -->
                                    @foreach($pegawai as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <!-- <td class="action-buttons">
                                            <a href="{{ route('pegawai.lihat', ['id' => $item->id]) }}" class="btn-green"><i class="fas fa-eye"></i> Lihat</a>
                                            <a href="{{ route('pegawai.edit', ['id' => $item->id]) }}" class="btn-orange"><i class="fas fa-edit"></i> Edit</a>
                                            <form action="{{ route('pegawai.hapus', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-red"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            </form>
                                        </td> -->
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
