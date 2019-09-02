<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlatMasuk;
use App\Alat;
use App\StokAlat;

class AlatMasukController extends Controller
{
	public function gudangAlatMasuk() {
		$alat = Alat::all();
		$am = AlatMasuk::where('id_user', auth()->user()->id)->get();
    	return view('item.gudang-kelola-alat-masuk')->with('alats', $alat)->with('ams', $am);
    }

    public function post(Request $req) {
    	$am = new AlatMasuk;
    	$am->id_user = 1;
    	$am->id_alat = $req->input('id_alat');
    	$am->jumlah = $req->input('jumlah');
    	$am->tanggal_masuk = date('Y-m-d', strtotime($req->input('tanggal')));
    	$am->save();

    	// Cek apakah alat ada di stok
        $stok = StokAlat::where('id_pemilik', 1)->where('id_alat', $req->input('id_alat'))->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->stok += $req->input('jumlah');
            $lama->save();
        }else{
            $baru = new StokAlat;
            $baru->id_pemilik = auth()->user()->id;
            $baru->id_alat = $req->input('id_alat');
            $baru->stok = $req->input('jumlah');
            $baru->save();
        }

    	return redirect(route('gudang.kelola.alat-masuk'))->with('success', 'Berhasil menambah alat masuk');
    }
}
