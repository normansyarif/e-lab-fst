<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Pengajuan;
use App\Distribusi;

class LokasiController extends Controller
{
    public function gudang() {
    	$gudangs = Lokasi::where('tipe', 1)->get();
    	return view('lokasi.gudang')->with('gudangs', $gudangs);
    }

    public function labor() {
    	$labors = Lokasi::where('tipe', 2)->get();
    	return view('lokasi.labor')->with('labors', $labors);
    }

    public function laborPost(Request $req) {
    	$l = new Lokasi;
    	$l->nama = $req->input('nama');
        $l->tipe = 2;
        $l->deskripsi = $req->input('deskripsi');
    	$l->lokasi = $req->input('lokasi');
    	$l->save();

    	return redirect(route('gudang.labor'))->with('success', 'Berhasil menambah laboratorium');
    }

    public function gudangPost(Request $req) {
        $l = new Lokasi;
        $l->nama = $req->input('nama');
        $l->tipe = 1;
        $l->deskripsi = $req->input('deskripsi');
        $l->lokasi = $req->input('lokasi');
        $l->save();

        return redirect(route('gudang.gudang'))->with('success', 'Berhasil menambah gudang');
    }
}
