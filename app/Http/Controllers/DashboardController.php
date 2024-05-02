<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Izin;

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


    public function tepatwaktu(Request $request)
{
    // Ambil data pegawai yang hadir tepat waktu dengan menggunakan kondisi tertentu
    $tepat_waktu = Attendance::whereNotNull('masuk')
                            ->where('tanggal', date('Y-m-d'))
                            ->where('masuk', '<=', '07:15:00') // Ubah operator menjadi <=
                            ->get();

    // Jika permintaan datang dari API, kembalikan respons JSON
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Sukses mendapatkan data pegawai yang hadir tepat waktu',
            'data' => $tepat_waktu
        ]);
    }

    // Jika permintaan datang dari web, kembalikan view 'attend.tepatwaktu' dengan data yang diperlukan
    $npage = 2; // Contoh nilai untuk npage
    return view('attend.tepatwaktu', compact('tepat_waktu', 'npage'));
}




    public function terlambat()
    {
        $npage = 4;
    
        // Misalnya, ambil data pegawai yang terlambat dengan menggunakan kondisi tertentu
        $terlambats = Attendance::whereNotNull('masuk')
                                ->whereDate('tanggal', '=', date('Y-m-d'))
                                ->where('masuk', '>', '07:15:00')
                                ->get();

        
        // Mengirim variabel $terlambats dan $npage ke view 'attend.terlambat'
        return view('attend.terlambat', compact('terlambats', 'npage'));
    }
    

    public function izin()
    {
        $npage = 5;
        // $izins = Izin::all();
        $izins = Izin::select('izins.*', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'izins.user_id')
        ->get();
        return view('attend.izin', [
            'izins' => $izins
        ], compact('npage'));
    }


    public function rekap()
    {
        $npage = 7;
        return view('rekapabsen', compact('npage'));
    }
    
    public function laporan()
    {
        $npage = 8;
        
    
        // Ambil data laporan berdasarkan filter yang diberikan
        $laporan = User::with(['attendance', 'izin'])
                    // ->whereHas('attendance', function ($query) use ($request) {
                    //     if ($request->has('status_presensi')) {
                    //         $query->where('status', $request->status_presensi);
                    //     }
                    //     if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
                    //         $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
                    //     }
                    // })
                    // ->whereHas('izin', function ($query) use ($request) {
                    //     if ($request->has('jenis_izin')) {
                    //         $query->where('jenis_izin', $request->jenis_izin);
                    //     }
                    //     if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
                    //         $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
                    //     }
                    // })
                    ->get();

                    return view('laporan', ['laporan' => $laporan, 'npage' => $npage]);
                
    }

    public function getPegawai()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return response()->json($pegawai);
    }
    

}