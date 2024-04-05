<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DKController extends Controller
{
    public function index()
    {
        return view('datakaryawan');
    }
}
