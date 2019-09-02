<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Gudang;

class LokasiController extends Controller
{
    public function gudang() {
    	$gudangs = Gudang::all();
    	return view('lokasi.gudang')->with('gudangs', $gudangs);
    }

    public function labor() {
    	$labors = Lokasi::all();
    	return view('lokasi.labor')->with('labors', $labors);
    }

    public function laborPost(Request $req) {
    	$l = new Lokasi;
    	$l->nama = $req->input('nama');
    	$l->lokasi = $req->input('lokasi');
    	$l->save();

    	return redirect(route('gudang.labor'))->with('success', 'Berhasil menambah laboratorium');
    }

    public function gudangPost(Request $req) {
        $l = new Gudang;
        $l->nama = $req->input('nama');
        $l->lokasi = $req->input('lokasi');
        $l->save();

        return redirect(route('gudang.gudang'))->with('success', 'Berhasil menambah gudang');
    }
}
