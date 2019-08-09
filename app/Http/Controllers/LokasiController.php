<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function gudang() {
    	return view('lokasi.gudang');
    }

    public function labor() {
    	return view('lokasi.labor');
    }
}
