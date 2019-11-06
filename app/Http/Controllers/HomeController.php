<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Pengajuan;
use App\Bahan;
use App\Lokasi;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function root()
    {
        if(auth()->user()->in_charge->lokasi->tipe == 1) {
            return redirect(route('gudang.dashboard'));
        }else if(auth()->user()->in_charge->lokasi->tipe == 2) {
            return redirect(route('labor.dashboard'));
        }else if(auth()->user()->in_charge->lokasi->tipe == 3){
            return redirect(route('user.index'));
        }else{
            return 'Anda tidak punya akses ke sistem.';
        }
    }

    public function gudangDashboard()
    {
        $alat = Alat::all();
        $bahan = Bahan::all();
        $ajuanSedang = Pengajuan::whereIn('status', [1, 2])->count();
        $ajuanDiterima = Pengajuan::where('status', 5)->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanDiteruskan = Pengajuan::where('id_teraju', '!=', auth()->user()->in_charge->lokasi->id)->count();
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
        $usulanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_pengaju', auth()->user()->in_charge->lokasi->id)->count();
        $usulanDiterima = Pengajuan::where('status', 5)->where('id_pengaju', auth()->user()->in_charge->lokasi->id)->count();
        $usulanDitolak = Pengajuan::where('status', 6)->where('id_pengaju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanDiterima = Pengajuan::where('status', 5)->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanDitolak = Pengajuan::where('status', 6)->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
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
