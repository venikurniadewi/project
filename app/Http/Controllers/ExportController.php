<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Presensi;


class ExportController extends Controller
{
    public function exportToPdf()
    {
        $presensis = Presensi::all();

        $pdf = new Dompdf();
        $pdf->loadHTML(view('export_to_pdf', compact('presensis')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('presensi.pdf');
    }
}
