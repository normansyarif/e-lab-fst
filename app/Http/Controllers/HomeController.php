<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Pengajuan;
use App\Bahan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function root()
    {
        if(auth()->user()->role == 1) {
            return redirect(route('gudang.dashboard'));
        }else if(auth()->user()->role == 2) {
            return redirect(route('labor.dashboard'));
        }
    }

    public function gudangDashboard()
    {
        $alat = Alat::all();
        $bahan = Bahan::all();
        $ajuanSedang = Pengajuan::whereIn('status', [1, 2])->count();
        $ajuanDiterima = Pengajuan::where('status', 5)->where('id_teraju', 1)->count();
        $ajuanDiteruskan = Pengajuan::where('id_teraju', '!=', 1)->count();
        return view('home.gudang-dashboard')
            ->with('alats', $alat)
            ->with('bahans', $bahan)
            ->with('ajuanSedang', $ajuanSedang)
            ->with('ajuanDiterima', $ajuanDiterima)
            ->with('ajuanDiteruskan', $ajuanDiteruskan);
    }

    public function laborDashboard()
    {
        $alat = Alat::all();
        $bahan = Bahan::all();
        $usulanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_pengaju', auth()->user()->id)->count();
        $usulanDiterima = Pengajuan::where('status', 5)->where('id_pengaju', auth()->user()->id)->count();
        $usulanDitolak = Pengajuan::where('status', 6)->where('id_pengaju', auth()->user()->id)->count();
        $ajuanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_teraju', auth()->user()->id)->count();
        $ajuanDiterima = Pengajuan::where('status', 5)->where('id_teraju', auth()->user()->id)->count();
        $ajuanDitolak = Pengajuan::where('status', 6)->where('id_teraju', auth()->user()->id)->count();
        return view('home.labor-dashboard')
            ->with('alats', $alat)
            ->with('bahans', $bahan)
            ->with('usulanSedang', $usulanSedang)
            ->with('usulanDiterima', $usulanDiterima)
            ->with('usulanDitolak', $usulanDitolak)
            ->with('ajuanSedang', $ajuanSedang)
            ->with('ajuanDiterima', $ajuanDiterima)
            ->with('ajuanDitolak', $ajuanDitolak);
    }
}
