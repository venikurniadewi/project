<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
        public function index()
    {
        $npage = 0;
        return view('dashboardd', compact('npage'));
    }

    public function jumlah()
    {
        $npage = 1;
        $pegawai = User::where('role', 'pegawai') // Mengambil hanya pegawai dengan role 'pegawai'
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('jumlahkaryawan', compact('pegawai', 'npage'));
    }


    public function tepatwaktu()
    {
        $npage = 2;
        return view('attend.tepatwaktu', compact('npage'));
    }

    public function terlambat()
    {
        $npage = 3;
        return view('attend.terlambat', compact('npage'));
    }

    public function izin()
    {
        $npage = 4;
        return view('attend.izin', compact('npage'));
    }
    public function rekap()
    {
        $npage = 6;
        return view('rekapabsen', compact('npage'));
    }
    

    public function getPegawai()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return response()->json($pegawai);
    }
    

}