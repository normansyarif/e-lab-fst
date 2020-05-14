<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanKeluar;
use App\Lokasi;
use App\Pengajuan;
use App\Distribusi;

class BahanKeluarController extends Controller
{
    public function laborBahanKeluar() {
    	$keluar = BahanKeluar::where('id_dari', auth()->user()->in_charge->lokasi->id)->get();
    	$usulanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_pengaju', auth()->user()->in_charge->lokasi->id)->count();
		$ajuanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
		$distSedang = Distribusi::where('status', 1)->where('id_tujuan', auth()->user()->in_charge->lokasi->id)->count();
        return view('item.lab-kelola-bahan-keluar')->with('keluars', $keluar)->with('usulanSedang', $usulanSedang)->with('ajuanSedang', $ajuanSedang)->with('distSedang', $distSedang);
    }
}
