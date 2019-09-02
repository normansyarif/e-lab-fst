<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;
use App\Alat;
use App\Distribusi;
use App\User;
use App\DistribusiAlat;
use App\DistribusiBahan;

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

    	// Insert item distribusi alat
    	for($i = 1; $i <= $alatCount; $i++) {
    		$da = new DistribusiAlat;
    		$da->id_distribusi = $dist->id;
    		$da->id_alat = $req->input('id_alat_' . $i);
    		$da->jumlah = $req->input('jumlah_alat_' . $i);
    		$da->save();
    	}

    	// Insert item distribusi bahan
    	for($i = 1; $i <= $bahanCount; $i++) {
    		$db = new DistribusiBahan;
    		$db->id_distribusi = $dist->id;
    		$db->id_bahan = $req->input('id_bahan_' . $i);
    		$db->jumlah = $req->input('jumlah_bahan_' . $i);
    		$db->save();
    	}

    	return redirect(route('gudang.kelola.distribusi'))->with('success', 'Berhasil membuat distribusi');
    }

    public function cekDetail($id_distribusi) {
    	$da = DistribusiAlat::where('id_distribusi', $id_distribusi)->get();
    	$db = DistribusiBahan::where('id_distribusi', $id_distribusi)->get();
    	return view('ajax.detail-distribusi')->with('das', $da)->with('dbs', $db);
    }
}
