<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanKeluar;

class BahanKeluarController extends Controller
{
    public function laborBahanKeluar() {
    	$keluar = BahanKeluar::where('id_dari', auth()->user()->id)->get();
        return view('item.lab-kelola-bahan-keluar')->with('keluars', $keluar);
    }
}
