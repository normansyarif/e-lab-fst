<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Alat;
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
    	return view('item.gudang-stok-bahan');
    }

    public function gudangAlatMasuk() {
    	return view('item.gudang-kelola-alat-masuk');
    }

    public function gudangBahanMasuk() {
    	return view('item.gudang-kelola-bahan-masuk');
    }

    public function gudangDistribusi() {
    	return view('item.gudang-kelola-distribusi');
    }

    public function gudangBuatDistribusi() {
    	return view('item.gudang-kelola-buat-distribusi');
    }

    public function laborAlat() {
        return view('item.lab-stok-alat');
    }

    public function laborBahan() {
        return view('item.lab-stok-bahan');
    }

    public function laborItemMasuk() {
        return view('item.lab-kelola-item-masuk');
    }

    public function laborAlatKeluar() {
        return view('item.lab-kelola-alat-keluar');
    }

    public function laborBahanKeluar() {
        return view('item.lab-kelola-bahan-keluar');
    }

}