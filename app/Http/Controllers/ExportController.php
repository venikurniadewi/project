<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Presensi;
use App\Models\Pegawai;


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
        $pegawais = Pegawai::all();

        $pdf = new Dompdf();
        $pdf->loadHTML(view('export.exportjk_pdf', compact('pegawais')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('data_pegawai.pdf');
    }
}
