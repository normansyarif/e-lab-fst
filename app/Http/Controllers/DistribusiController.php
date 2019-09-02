<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;
use App\Alat;
use App\Distribusi;
use App\User;

class DistribusiController extends Controller
{
	public function gudangDistribusi() {
		$distribusi = Distribusi::all();
    	return view('item.gudang-kelola-distribusi')->with('distribusis', $distribusi);
    }

    public function gudangBuatDistribusi() {
    	$alat = Alat::all();
    	$bahan = Bahan::all();
    	$labs = User::where('id', '!=', 1)->get();
    	return view('item.gudang-kelola-buat-distribusi')->with('labs', $labs)->with('alats', $alat)->with('bahans', $bahan);
    }

    public function post(Request $req) {
    	$alatCount = $req->input('alat-counter');
    	$bahanCount = $req->input('bahan-counter');

    	$dist = new Distribusi;
    	$dist->id_tujuan = $req->input('tujuan');
    	$dist->total_jumlah = $alatCount . ' alat, ' . $bahanCount . ' bahan';
    	$dist->status = 1;
    	$dist->save();
    	return redirect(route('gudang.kelola.distribusi'))->with('success', 'Berhasil membuat distribusi');
    }
}
