<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Izin;
use Illuminate\Http\Request;


class ExportController extends Controller
{
    public function exportToPdf()
    {
        $presensis = Presensi::all();

        $pdf = new Dompdf();
        $pdf->loadHTML(view('export.export_to_pdf', compact('presensis')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('presensi.pdf');
    }

    
    public function exportjk()
    {
        $pegawais = User::where('role', 'pegawai')->get(); // tambahkan get() untuk mengambil hasil query
    
        $pdf = new Dompdf();
        $pdf->loadHTML(view('export.exportjk_pdf', compact('pegawais'))->render()); // tambahkan render() untuk merender view ke dalam HTML
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('data_pegawai.pdf');
    }
    


    

public function exportlap($bulan, $tahun)
{
    $npage = 7;

    $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'izins.user_id')
        ->whereMonth('izins.tanggal', $bulan)
        ->whereYear('izins.tanggal', $tahun)
        ->get();

    $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'attendances.user_id')
        ->whereMonth('attendances.tanggal', $bulan)
        ->whereYear('attendances.tanggal', $tahun)
        ->get();
    
    $laporans = $izins->merge($attendances);
    
    $laporans = User::with(['attendances', 'izins'])
                    ->where('role', 'pegawai')
                    ->get()
                    ->map(function ($user) use ($bulan, $tahun) {
                        $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                        $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                        $user->hadir_count = $user->attendances->count();
                        $user->izin_count = $user->izins->count();
                        return $user;
                    });

    // Load view for PDF
    $pdf = new Dompdf();
    $pdf->loadHTML(view('export.cetak_laporan', [
        'laporans' => $laporans,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'npage' => $npage,
    ])->render());

    // Render PDF
    $pdf->setPaper('A4', 'landscape');
    $pdf->render();

    // Stream PDF
    return $pdf->stream('rekap_pegawai.pdf');
}

    
    public function cetaklap($bulan, $tahun)
{
    $npage = 7;

    $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'izins.user_id')
        ->whereMonth('izins.tanggal', $bulan)
        ->whereYear('izins.tanggal', $tahun)
        ->get();

    $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'attendances.user_id')
        ->whereMonth('attendances.tanggal', $bulan)
        ->whereYear('attendances.tanggal', $tahun)
        ->get();
    
    $laporans = $izins->merge($attendances);
    
    $laporans = User::with(['attendances', 'izins'])
                    ->where('role', 'pegawai')
                    ->get()
                    ->map(function ($user) use ($bulan, $tahun) {
                        $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                        $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                        $user->hadir_count = $user->attendances->count();
                        $user->izin_count = $user->izins->count();
                        return $user;
                    });

    return view('export.cetak_laporan', [
        'laporans' => $laporans,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'npage' => $npage,
    ]);
}


public function cetakPegawai(Request $request, $userId)
{
    $bulan = $request->input('bulan') ?? date('m');
    $tahun = $request->input('tahun') ?? date('Y');

    // Find the user by ID
    $user = User::findOrFail($userId);

    // Retrieve attendance records for the user based on selected month and year
    $rekapAbsensi = $user->attendances()
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal', 'asc')
        ->get();

    // Retrieve izin records for the user based on selected month and year
    $rekapIzin = $user->izins()
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal', 'asc')
        ->get();

    // Pass the user, attendance, and izin data to the view along with selected month and year
    return view('export.cetak_pegawai', [
        'user' => $user,
        'rekapAbsensi' => $rekapAbsensi,
        'rekapIzin' => $rekapIzin,
        'bulan' => $bulan,
        'tahun' => $tahun,
    ]);
}

public function pegawaiPdf(Request $request, $userId)
{
    $bulan = $request->input('bulan') ?? date('m');
    $tahun = $request->input('tahun') ?? date('Y');

    // Find the user by ID
    $user = User::findOrFail($userId);

    // Retrieve attendance records for the user based on selected month and year
    $rekapAbsensi = $user->attendances()
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal', 'asc')
        ->get();

    // Retrieve izin records for the user based on selected month and year
    $rekapIzin = $user->izins()
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal', 'asc')
        ->get();

    // Create PDF instance
    $pdf = new Dompdf();

    // Load the HTML view along with the selected month and year
    $pdf->loadHTML(view('export.laporanpegawai', compact('user', 'rekapAbsensi', 'rekapIzin', 'bulan', 'tahun'))->render());

    // Set paper size and orientation
    $pdf->setPaper('A4', 'landscape');

    // Render the PDF
    $pdf->render();

    // Output the PDF
    return $pdf->stream('laporan_pegawai.pdf');
}

}
