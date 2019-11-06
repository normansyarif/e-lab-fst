<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlatKeluar;
use App\Lokasi;

class AlatKeluarController extends Controller
{
    public function laborAlatKeluar() {
    	$keluar = AlatKeluar::where('id_dari', auth()->user()->in_charge->lokasi->id)->get();
        return view('item.lab-kelola-alat-keluar')->with('keluars', $keluar);
    }
}
