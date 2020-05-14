<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Pengajuan;
use App\Bahan;
use App\Distribusi;
use App\Lokasi;
use App\Rekap;

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
        $ajuanSedang = Pengajuan::whereIn('status', [1, 2])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanDiterima = Pengajuan::where('status', 5)->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanDiteruskan = Pengajuan::where('id_teraju', '!=', auth()->user()->in_charge->lokasi->id)->count();
        $distSedang = Distribusi::where('status', 1)->where('id_asal', auth()->user()->in_charge->lokasi->id)->count();
        $rekap = Rekap::where('lokasi_id', auth()->user()->in_charge->lokasi->id)->whereYear('updated_at', date("Y", time()))->whereMonth('updated_at', date("n", time()))->get();

        if(count($rekap) > 0) {
            $hasPosted = true;
            $filename = $rekap[0]->file;
            $date = date('d/m/Y H:i', strtotime($rekap[0]->created_at));
        }else{
            $hasPosted = false;
            $filename = '';
            $date = '';
        }

        return view('home.gudang-dashboard')
            ->with('alats', $alat)
            ->with('bahans', $bahan)
            ->with('ajuanSedang', $ajuanSedang)
            ->with('ajuanDiterima', $ajuanDiterima)
            ->with('ajuanDiteruskan', $ajuanDiteruskan)
            ->with('distSedang', $distSedang)
            ->with('hasPosted', $hasPosted)
             ->with('filename', $filename)
             ->with('date', $date);
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
        $distSedang = Distribusi::where('status', 1)->where('id_tujuan', auth()->user()->in_charge->lokasi->id)->count();
        $rekap = Rekap::where('lokasi_id', auth()->user()->in_charge->lokasi->id)->whereYear('updated_at', date("Y", time()))->whereMonth('updated_at', date("n", time()))->get();

        if(count($rekap) > 0) {
            $hasPosted = true;
            $filename = $rekap[0]->file;
            $date = date('d/m/Y H:i', strtotime($rekap[0]->created_at));
        }else{
            $hasPosted = false;
            $filename = '';
            $date = '';
        }

        return view('home.labor-dashboard')
            ->with('alats', $alat)
            ->with('bahans', $bahan)
            ->with('usulanSedang', $usulanSedang)
            ->with('usulanDiterima', $usulanDiterima)
            ->with('usulanDitolak', $usulanDitolak)
            ->with('ajuanSedang', $ajuanSedang)
            ->with('ajuanDiterima', $ajuanDiterima)
            ->with('ajuanDitolak', $ajuanDitolak)
            ->with('distSedang', $distSedang)
            ->with('hasPosted', $hasPosted)
            ->with('filename', $filename)
            ->with('date', $date);
    }
}
