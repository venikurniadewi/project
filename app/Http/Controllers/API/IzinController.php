<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Izin;

class IzinController extends Controller
{
    
    public function store(Request $request)
    {
        try {
            // Validasi data dari request
            $request->validate([
                'alasan' => 'required|string',
                'keterangan' => 'required|string', // Menjadikan keterangan wajib diisi
            ]);

            // Simpan data izin ke dalam database
            $izin = new Izin();
            $izin->alasan = $request->alasan; // Mengubah 'reason' menjadi 'alasan'
            $izin->keterangan = $request->keterangan; // Mengubah 'additional_info' menjadi 'keterangan'
            $izin->save();

            // Beri respons bahwa izin berhasil disimpan
            return response()->json(['message' => 'Izin berhasil disimpan'], 201);
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                // Validasi gagal, kembalikan respons dengan status 422 dan pesan validasi
                return response()->json(['message' => 'Validasi gagal', 'errors' => $e->errors()], 422);
            } else {
                // Kesalahan server internal, kembalikan respons dengan status 500
                return response()->json(['message' => 'Terjadi kesalahan server internal'], 500);
            }
        }
    }
}
