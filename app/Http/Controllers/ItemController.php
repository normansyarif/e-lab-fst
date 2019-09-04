<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Alat;
use App\Jenis;
use App\StokAlat;
use App\Bahan;
use App\StokBahan;
use App\Gudang;

class ItemController extends Controller
{
    public function gudangAlat() {
        $stoks = StokAlat::where('id_pemilik', 1)->get();
        $als = Alat::all();
        $ks = Kategori::all();
        $gds = Gudang::all();
    	return view('item.gudang-stok-alat')->with('ks', $ks)->with('stoks', $stoks)->with('gudangs', $gds)->with('als', $als);
    }

    public function postAlat(Request $req) {
        $alat = new Alat;
        $alat->nama = $req->input('nama');
        $alat->id_kategori = $req->input('id_kategori');
        $alat->save();
        return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil menambah alat');
    }

    public function addAlatStock(Request $req) {
        $alat_id = $req->input('alat_id');

        // Cek apakah alat ada di stok
        $stok = StokAlat::where('id_pemilik', auth()->user()->id)->where('id_alat', $alat_id)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->stok += $req->input('stok');
            $lama->save();
            return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil menambah stok');
        }else{
            $baru = new StokAlat;
            $baru->id_pemilik = auth()->user()->id;
            $baru->id_alat = $alat_id;
            $baru->stok = $req->input('stok');
            $baru->save();
            return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil menambah stok');
        }
    }

    public function deleteAlat($id) {
        $alat = Alat::find($id);
        $alat->delete();

        $stok = StokAlat::where('id_alat', $id);
        $stok->delete();
        return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil menghapus alat');
    }

    public function editAlat(Request $req) {
        $alat = Alat::find($req->input('alat_id'));
        $alat->nama = $req->input('nama');
        $alat->id_kategori = $req->input('id_kategori');
        $alat->save();
        return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil mengubah alat');
    }

    public function gudangBahan() {
        $stoks = StokBahan::where('id_pemilik', 1)->get();
        $bahs = Bahan::all();
        $jens = Jenis::all();
        $gds = Gudang::all();
    	return view('item.gudang-stok-bahan')->with('jens', $jens)->with('stoks', $stoks)->with('gudangs', $gds)->with('bahs', $bahs);
    }

    public function postBahan(Request $req) {
        $bahan = new Bahan;
        $bahan->nama = $req->input('nama');
        $bahan->id_jenis = $req->input('id_jenis');
        $bahan->unit = $req->input('unit');
        $bahan->save();
        return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil menambah bahan');
    }

    public function addBahanStock(Request $req) {
        $bahan_id = $req->input('bahan_id');

        // Cek apakah alat ada di stok
        $stok = StokBahan::where('id_pemilik', auth()->user()->id)->where('id_bahan', $bahan_id)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->stok += $req->input('stok');
            $lama->save();
            return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil menambah stok');
        }else{
            $baru = new StokBahan;
            $baru->id_pemilik = auth()->user()->id;
            $baru->id_bahan = $bahan_id;
            $baru->stok = $req->input('stok');
            $baru->save();
            return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil menambah stok');
        }
    }

    public function editBahan(Request $req) {
        $bahan = Bahan::find($req->input('bahan_id'));
        $bahan->nama = $req->input('nama');
        $bahan->id_jenis = $req->input('id_jenis');
        $bahan->unit = $req->input('unit');
        $bahan->save();
        return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil mengubah bahan');
    }

    public function deleteBahan($id) {
        $bahan = Bahan::find($id);
        $bahan->delete();

        $stok = StokBahan::where('id_bahan', $id);
        $stok->delete();
        return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil menghapus bahan');
    }

    public function laborAlat() {
        $stoks = StokAlat::where('id_pemilik', auth()->user()->id)->get();
        return view('item.lab-stok-alat')->with('stoks', $stoks);
    }

    public function laborBahan() {
        $stoks = StokBahan::where('id_pemilik', auth()->user()->id)->get();
        return view('item.lab-stok-bahan')->with('stoks', $stoks);
    }

    // Ajax methods
    public function cekStokAlat($id) {
        $alat = Alat::find($id);
        $stok = StokAlat::where('id_alat', $id);
        return view('ajax.detail-stok-alat')->with('alat', $alat)->with('stoks', $stok->get())->with('grandStock', $stok->sum('stok'));
    }

    public function cekStokBahan($id) {
        $bahan = Bahan::find($id);
        $stok = StokBahan::where('id_bahan', $id);
        return view('ajax.detail-stok-bahan')->with('bahan', $bahan)->with('stoks', $stok->get())->with('grandStock', $stok->sum('stok'));
    }
}
