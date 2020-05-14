<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlatKeluar;
use App\Lokasi;
use App\Pengajuan;
use App\Distribusi;

class AlatKeluarController extends Controller
{
    public function laborAlatKeluar() {
    	$usulanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_pengaju', auth()->user()->in_charge->lokasi->id)->count();
		$ajuanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
		$distSedang = Distribusi::where('status', 1)->where('id_tujuan', auth()->user()->in_charge->lokasi->id)->count();
    	$keluar = AlatKeluar::where('id_dari', auth()->user()->in_charge->lokasi->id)->get();
        return view('item.lab-kelola-alat-keluar')->with('keluars', $keluar)->with('usulanSedang', $usulanSedang)->with('ajuanSedang', $ajuanSedang)->with('distSedang', $distSedang);
    }
}
