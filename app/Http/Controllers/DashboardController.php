<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Izin;
use App\Models\Laporan;

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
                            ->where('masuk', '<=', '09:00:00') // Ubah operator menjadi <=
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
                                ->where('masuk', '>', '09:00:00')
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
    
    public function laporan(Request $request)
    {
        $npage = 8;
        // $npage = 8;
        
    
        $bulan = $request->input('bulan') ?? date('m');
        $tahun = $request->input('tahun') ?? date('Y');
    
        // Ambil data izin sesuai bulan dan tahun yang dipilih
        $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
            ->join('users', 'users.id', '=', 'izins.user_id')
            ->whereMonth('izins.tanggal', $bulan)
            ->whereYear('izins.tanggal', $tahun)
            ->get();
    
        // Ambil data kehadiran sesuai bulan dan tahun yang dipilih
        $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->whereMonth('attendances.tanggal', $bulan)
            ->whereYear('attendances.tanggal', $tahun)
            ->get();
        
        // Gabungkan data izin dan kehadiran
        $laporans = $izins->merge($attendances);
    
        // Ambil data user dengan relasi kehadiran dan izin
        $laporans = User::with(['attendances', 'izins'])
                        ->where('role', 'pegawai')
                        ->get()
                        ->map(function ($user) use ($bulan, $tahun) {
                            // Filter kehadiran sesuai bulan dan tahun yang dipilih
                            $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            // Filter izin sesuai bulan dan tahun yang dipilih
                            $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            // Hitung jumlah kehadiran dan izin
                            $user->hadir_count = $user->attendances->count();
                            $user->izin_count = $user->izins->count();
                            return $user;
                        });
    
        return view('laporan', [
            'laporans' => $laporans,
            'npage' => $npage,
            'bulan' => $bulan, 'tahun' => $tahun
        ]);
    }
    

    public function getPegawai()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return response()->json($pegawai);
    }
    
    


}