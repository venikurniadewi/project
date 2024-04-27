<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use stdClass;

date_default_timezone_set("Asia/Jakarta");

class AttendanceController extends Controller
{
    public function getPresensis()
    {
        $presensis = Attendance::where('user_id', Auth::user()->id)->get();
        foreach ($presensis as $item) {
            if ($item->tanggal == date('Y-m-d')) {
                $item->is_hari_ini = true;
            } else {
                $item->is_hari_ini = false;
            }
            $datetime = Carbon::parse($item->tanggal)->locale('id');
            $masuk = Carbon::parse($item->masuk)->locale('id');
            $pulang = Carbon::parse($item->pulang)->locale('id');

            $datetime->settings(['formatFunction' => 'translatedFormat']);
            $masuk->settings(['formatFunction' => 'translatedFormat']);
            $pulang->settings(['formatFunction' => 'translatedFormat']);

            $item->tanggal = $datetime->format('l, j F Y');
            $item->masuk = $masuk->format('H:i');
            $item->pulang = $pulang->format('H:i');
        }

        return response()->json([
            'success' => true,
            'message' => 'Sukses menampilkan data',
            'data' => $presensis
        ]);
    }

    public function savePresensi(Request $request)
    {
        $keterangan = "";
        $presensi = Attendance::whereDate('tanggal', '=', date('Y-m-d'))
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($presensi == null) {
            $presensi = Attendance::create([
                'user_id' => Auth::user()->id,
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'tanggal' => date('Y-m-d'),
                'masuk' => date('H:i:s'),
                'pulang' => null
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Sukses absen untuk masuk',
                'data' => $presensi
            ]);
        } else {
            if ($presensi->pulang !== null) {
                $keterangan = "Anda sudah melakukan presensi";
                return response()->json([
                    'success' => false,
                    'message' => $keterangan,
                    'data' => null
                ]);
            } else {
                $data = [
                    'pulang' => date('H:i:s')
                ];
                Attendance::whereDate('tanggal', '=', date('Y-m-d'))
                    ->where('user_id', Auth::user()->id)
                    ->update($data);
            }
            $presensi = Attendance::whereDate('tanggal', '=', date('Y-m-d'))
                ->where('user_id', Auth::user()->id)
                ->first();

            return response()->json([
                'success' => true,
                'message' => 'Sukses Absen untuk Pulang',
                'data' => $presensi
            ]);
        }
    }
}
