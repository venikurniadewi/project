<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelatController extends Controller
{
    public function terlambat()
    {
        return view('layouts.terlambat');
    }
}
