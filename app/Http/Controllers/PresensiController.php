<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi; // Sesuaikan dengan model Presensi Anda jika ada

class PresensiController extends Controller
{
    public function tepatWaktu(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'id_karyawan' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i:s'
        ]);

        // Simpan data presensi ke dalam database
        Presensi::create([
            'id_karyawan' => $request->id_karyawan,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jenis' => 'tepat_waktu' // Tambahkan jenis presensi sesuai dengan endpoint
        ]);

        // Beri respon sukses
        return response()->json(['message' => 'Presensi tepat waktu berhasil disimpan'], 201);
    }

    public function terlambat(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'id_karyawan' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i:s',
            'alasan_terlambat' => 'required|string'
        ]);

        // Simpan data presensi ke dalam database
        Presensi::create([
            'id_karyawan' => $request->id_karyawan,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jenis' => 'terlambat', // Tambahkan jenis presensi sesuai dengan endpoint
            'alasan' => $request->alasan_terlambat
        ]);

        // Beri respon sukses
        return response()->json(['message' => 'Presensi terlambat berhasil disimpan'], 201);
    }

    public function izin(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'id_karyawan' => 'required',
            'tanggal' => 'required|date',
            'alasan_izin' => 'required|string'
        ]);

        // Simpan data presensi ke dalam database
        Presensi::create([
            'id_karyawan' => $request->id_karyawan,
            'tanggal' => $request->tanggal,
            'jenis' => 'izin', // Tambahkan jenis presensi sesuai dengan endpoint
            'alasan' => $request->alasan_izin
        ]);

        // Beri respon sukses
        return response()->json(['message' => 'Presensi izin berhasil disimpan'], 201);
    }
}
