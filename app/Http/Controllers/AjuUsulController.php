<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjuUsulController extends Controller
{
    public function gudangPengajuan() {
    	return view('aju_usul.gudang-pengajuan');
    }

    public function laborPengusulan() {
    	return view('aju_usul.lab-pengusulan');
    }

    public function laborPengajuan() {
    	return view('aju_usul.lab-pengajuan');
    }
}
