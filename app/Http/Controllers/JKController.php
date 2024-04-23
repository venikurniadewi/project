<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JKController extends Controller
{
    public function jumlah()
    {
        return view('jumlahkaryawan');
    }
}
