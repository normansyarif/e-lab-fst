<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlatKeluar;

class AlatKeluarController extends Controller
{
    public function laborAlatKeluar() {
    	$keluar = AlatKeluar::where('id_dari', auth()->user()->id)->get();
        return view('item.lab-kelola-alat-keluar')->with('keluars', $keluar);
    }
}
