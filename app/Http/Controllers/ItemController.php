<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Alat;
use App\Jenis;
use App\StokAlat;
use App\Bahan;
use App\StokBahan;
use App\Lokasi;

class ItemController extends Controller
{
    public function gudangAlat() {
        $stoks = StokAlat::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->get();
        $als = Alat::all();
        $ks = Kategori::all();
    	return view('item.gudang-stok-alat')->with('ks', $ks)->with('stoks', $stoks)->with('als', $als);
    }

    public function postAlat(Request $req) {
        $alat = new Alat;
        $alat->kode = $req->input('kode');
        if($req->input('merk') == '') {
            $alat->nama = $req->input('nama');
        }else{
            $alat->nama = $req->input('nama') . ' ('. $req->input('merk') .')';
        }
        $alat->id_kategori = $req->input('id_kategori');
        $alat->save();
        return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil menambah alat');
    }

    public function addAlatStock(Request $req) {
        $alat_id = $req->input('alat_id');

        // Cek apakah alat ada di stok
        $stok = StokAlat::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->where('id_alat', $alat_id)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->baik += $req->input('stok_baik');
            $lama->buruk += $req->input('stok_buruk');
            $lama->stok += $req->input('stok');
            $lama->save();
        }else{
            $baru = new StokAlat;
            $baru->id_pemilik = auth()->user()->in_charge->lokasi->id;
            $baru->id_alat = $alat_id;
            $baru->baik = $req->input('stok_baik');
            $baru->buruk = $req->input('stok_buruk');
            $baru->stok = $req->input('stok');
            $baru->save();
        }
        return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil menambah stok');
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
        $alat->kode = $req->input('kode');
        if($req->input('merk') == '') {
            $alat->nama = $req->input('nama');
        }else{
            $alat->nama = $req->input('nama') . ' ('. $req->input('merk') .')';
        }
        $alat->id_kategori = $req->input('id_kategori');
        $alat->save();
        return redirect(route('gudang.stok.alat'))->with('success', 'Berhasil mengubah alat');
    }

    public function gudangBahan() {
        $stoks = StokBahan::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->get();
        $bahs = Bahan::all();
        $jens = Jenis::all();
    	return view('item.gudang-stok-bahan')->with('jens', $jens)->with('stoks', $stoks)->with('bahs', $bahs);
    }

    public function postBahan(Request $req) {
        $bahan = new Bahan;
        $bahan->kode = $req->input('kode');
        $bahan->nama = $req->input('nama');
        $bahan->formula = $req->input('formula');
        $bahan->berat_molekul = $req->input('berat_molekul');
        $bahan->id_jenis = $req->input('id_jenis');
        $bahan->unit = $req->input('unit');
        $bahan->save();
        return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil menambah bahan');
    }

    public function addBahanStock(Request $req) {
        $bahan_id = $req->input('bahan_id');

        // Cek apakah alat ada di stok
        $stok = StokBahan::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->where('id_bahan', $bahan_id)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->baik += $req->input('stok_baik');
            $lama->buruk += $req->input('stok_buruk');
            $lama->stok += $req->input('stok');
            $lama->save();
        }else{
            $baru = new StokBahan;
            $baru->id_pemilik = auth()->user()->in_charge->lokasi->id;
            $baru->id_bahan = $bahan_id;
            $baru->baik = $req->input('stok_baik');
            $baru->buruk = $req->input('stok_buruk');
            $baru->stok = $req->input('stok');
            $baru->save();
        }
        return redirect(route('gudang.stok.bahan'))->with('success', 'Berhasil menambah stok');
    }

    public function editBahan(Request $req) {
        $bahan = Bahan::find($req->input('bahan_id'));
        $bahan->kode = $req->input('kode');
        $bahan->nama = $req->input('nama');
        $bahan->formula = $req->input('formula');
        $bahan->berat_molekul = $req->input('berat_molekul');
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
        $stoks = StokAlat::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->get();
        return view('item.lab-stok-alat')->with('stoks', $stoks);
    }

    public function laborBahan() {
        $stoks = StokBahan::where('id_pemilik', auth()->user()->in_charge->lokasi->id)->get();
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

    // Kategori
    public function indexKategori() {
        $kats = Kategori::all();
        return view('item.gudang-kelola-kategori')->with('kats', $kats);
    }

    public function postKategori(Request $req) {
        $kat = new Kategori;
        $kat->nama = $req->input('nama');
        $kat->save();
        return redirect(route('kategori.index'))->with('success', 'Berhasil menambah kategori');
    }

    public function deleteKategori($id) {
        $kat = Kategori::find($id);

        if(count($kat->alat) > 0) {
            return redirect(route('kategori.index'))->with('error', 'Tidak dapat menghapus karena terdapat alat yang menggunakan kategori ini');
        }else{
            $kat->delete();
            return redirect(route('kategori.index'))->with('success', 'Berhasil menghapus kategori');
        }
    }

    public function editKategori(Request $req) {
        $kat = Kategori::find($req->input('id_kategori'));
        $kat->nama = $req->input('nama_kategori');
        $kat->save();
        return redirect(route('kategori.index'))->with('success', 'Berhasil mengubah kategori');
    }

    // Jenis
    public function indexJenis() {
        $jenis = Jenis::all();
        return view('item.gudang-kelola-jenis')->with('jenis', $jenis);
    }

    public function postJenis(Request $req) {
        $jenis = new Jenis;
        $jenis->nama = $req->input('nama');
        $jenis->save();
        return redirect(route('jenis.index'))->with('success', 'Berhasil menambah jenis');
    }

    public function deleteJenis($id) {
        $jenis = Jenis::find($id);

        if(count($jenis->bahan) > 0) {
            return redirect(route('jenis.index'))->with('error', 'Tidak dapat menghapus karena terdapat bahan yang menggunakan jenis ini');
        }else{
            $jenis->delete();
            return redirect(route('jenis.index'))->with('success', 'Berhasil menghapus jenis');
        }
    }

    public function editJenis(Request $req) {
        $jenis = Jenis::find($req->input('id_jenis'));
        $jenis->nama = $req->input('nama_jenis');
        $jenis->save();
        return redirect(route('jenis.index'))->with('success', 'Berhasil mengubah jenis');
    }

    //QRCode
    public function showQRAlat($id) {
        $alat = Alat::find($id);
        $stok = StokAlat::where('id_alat', $id);
        return view('item.qr-data-alat')->with('alat', $alat)->with('stoks', $stok->get())->with('grandStock', $stok->sum('stok'));
    }

    public function showQRBahan($id) {
        $bahan = Bahan::find($id);
        $stok = StokBahan::where('id_bahan', $id);
        return view('item.qr-data-bahan')->with('bahan', $bahan)->with('stoks', $stok->get())->with('grandStock', $stok->sum('stok'));
    }

    public function codeQRAlat($id) {
        $alat = Alat::find($id);
        return view('item.qr-code-alat')->with('alat', $alat);
    }

    public function codeQRBahan($id) {
        $bahan = Bahan::find($id);
        return view('item.qr-code-bahan')->with('bahan', $bahan);
    }
}
