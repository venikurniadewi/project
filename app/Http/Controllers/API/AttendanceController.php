<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function saveAttendance(Request $request)
    {
        // Validasi data kehadiran jika diperlukan

        $attendance = Attendance::create([
            'user_id' => $request->user_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tanggal' => $request->tanggal,
            'masuk' => $request->masuk,
            'pulang' => $request->pulang,
        ]);

        return response()->json([
            'success' => true,
            'data' => $attendance,
            'message' => 'Data kehadiran berhasil disimpan.'
        ]);
    }
}
