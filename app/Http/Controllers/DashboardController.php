<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboardd');
    }

    public function jumlah()
    {
        return view('jumlahkaryawan');
    }

    public function tepatwaktu()
    {
        return view('tepatwaktu');
    }

    public function terlambat()
    {
        return view('terlambat');
    }

    public function izin()
    {
        return view('izin');
    }
    public function rekap()
    {
        return view('rekapabsen');
    }
    public function data()
    {
        $pegawai = Pegawai::all();
        return view('datakaryawan', ['pegawai' => $pegawai]);
    }
    public function setting()
    {
        return view('setting');
    }
    

}