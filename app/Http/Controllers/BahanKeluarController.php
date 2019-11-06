<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanKeluar;
use App\Lokasi;

class BahanKeluarController extends Controller
{
    public function laborBahanKeluar() {
    	$keluar = BahanKeluar::where('id_dari', auth()->user()->in_charge->lokasi->id)->get();
        return view('item.lab-kelola-bahan-keluar')->with('keluars', $keluar);
    }
}
