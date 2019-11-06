<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;
use App\StokBahan;
use App\BahanMasuk;
use App\Lokasi;

class BahanMasukController extends Controller
{
    public function gudangBahanMasuk() {
    	$bahan = Bahan::all();
		$bm = BahanMasuk::where('id_user', auth()->user()->in_charge->lokasi->id)->get();
    	return view('item.gudang-kelola-bahan-masuk')->with('bahans', $bahan)->with('bms', $bm);
    }

    public function post(Request $req) {
    	$bm = new BahanMasuk;
    	$bm->id_user = auth()->user()->in_charge->lokasi->id;
    	$bm->id_bahan = $req->input('id_bahan');
    	$bm->jumlah = $req->input('jumlah');
    	$bm->tanggal_masuk = date('Y-m-d', strtotime($req->input('tanggal')));
    	$bm->save();

    	// Cek apakah bahan ada di stok
        $stok = StokBahan::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->where('id_bahan', $req->input('id_bahan'))->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->baik += $req->input('jumlah');
            $lama->stok += $req->input('jumlah');
            $lama->save();
        }else{
            $baru = new StokBahan;
            $baru->id_pemilik = auth()->user()->in_charge->lokasi->id;
            $baru->id_bahan = $req->input('id_bahan');
            $baru->stok = $req->input('jumlah');
            $baru->save();

            $good = new StokBahanBaik;
            $good->stok_id = $baru->id;
            $good->baik = $req->input('jumlah');
            $good->jumlah = $req->input('jumlah');
            $good->save();
        }

    	return redirect(route('gudang.kelola.bahan-masuk'))->with('success', 'Berhasil menambah alat masuk');
    }
}
