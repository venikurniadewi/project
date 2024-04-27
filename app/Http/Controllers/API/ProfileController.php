<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function getUserProfileByName($name)
    {
        // Mengambil data pengguna dari database berdasarkan nama
        $user = User::where('name', $name)->first();

        // Periksa apakah pengguna ditemukan
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Format data pengguna
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'job_title' => $user->job_title,
            'address' => $user->address,
            // Anda bisa menambahkan kolom lain yang Anda perlukan
        ];

        // Mengembalikan data sebagai respons JSON
        return response()->json([$userData], 200);
    }
}
