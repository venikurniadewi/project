<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function izin()
    {
        return view('layouts.izin');
    }
}
