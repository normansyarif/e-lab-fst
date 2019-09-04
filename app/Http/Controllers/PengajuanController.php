<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan;
use App\Alat;
use App\Bahan;
use App\PengajuanAlat;
use App\PengajuanBahan;
use App\StokAlat;
use App\StokBahan;

class PengajuanController extends Controller
{
	public function gudangPengajuan() {
		$p = Pengajuan::all();
    	return view('aju_usul.gudang-pengajuan')->with('ajuans', $p);
    }

    public function gudangBuatPengajuan() {
    	$alat = Alat::all();
    	$bahan = Bahan::all();
    	return view('item.gudang-kelola-buat-pengajuan')->with('alats', $alat)->with('bahans', $bahan);
    }

    public function postKeDekanat(Request $req) {
    	$alatCount = $req->input('alat-counter');
    	$bahanCount = $req->input('bahan-counter');

    	// Jenis ajuan:
    	// 1. Permintaan
    	// 2. Peminjaman

  		// status pengajuan:
		// 1. menunggu konfirmasi gudang, gudang cek stok, lab no action
		// 2. mengunggu validasi gudang, lab cetak surat, gudang upload surat
		// 3. menunggu konfirmasi lab tujuan, gudang no action, lab sumber no action, lab tujuan cek stok, pesan semua
		// 4. menunggu validasi lab tujuan, gudang no action, lab sumber cetak surat, lab tujuan upload surat
		// 5. selesai, semua pesan, semua surat
		// 6. ditolak, semua pesan
    	$p = new Pengajuan;
    	$p->id_pengaju = 1;
    	$p->id_teraju = 0;
    	$p->jenis_ajuan = 1;
    	$p->jumlah = $alatCount . ' alat, ' . $bahanCount . ' bahan';
    	$p->status = 5;
    	$p->pesan = 'Pengajuan diteruskan ke dekanat.';
    	$p->save();

    	// Insert item distribusi alat
    	for($i = 1; $i <= $alatCount; $i++) {
    		$pa = new PengajuanAlat;
    		$pa->id_pengajuan = $p->id;
    		$pa->id_alat = $req->input('id_alat_' . $i);
    		$pa->jumlah = $req->input('jumlah_alat_' . $i);
    		$pa->save();
    	}

    	// Insert item distribusi bahan
    	for($i = 1; $i <= $bahanCount; $i++) {
    		$pb = new PengajuanBahan;
    		$pb->id_pengajuan = $p->id;
    		$pb->id_bahan = $req->input('id_bahan_' . $i);
    		$pb->jumlah = $req->input('jumlah_bahan_' . $i);
    		$pb->save();
    	}

    	return redirect(route('gudang.pengajuan'))->with('success', 'Berhasil membuat pengajuan');
    }

    public function printSurat($id) {
        return view('item.print-ajuan')->with('id', $id);
    }

    public function cekStok($id) {
        $alat = Alat::all();
        $bahan = Bahan::all();
        $pAlat = PengajuanAlat::where('id_pengajuan', $id)->get();
        $pBahan = PengajuanBahan::where('id_pengajuan', $id)->get();
        return view('item.gudang-kelola-cek-stok')->with('alats', $alat)->with('bahans', $bahan)->with('pAlats', $pAlat)->with('pBahans', $pBahan);
    }

    public function cekDetail($id_pengajuan) {
        $pa = PengajuanAlat::where('id_pengajuan', $id_pengajuan)->get();
        $pb = PengajuanBahan::where('id_pengajuan', $id_pengajuan)->get();
        return view('ajax.detail-ajuan')->with('pas', $pa)->with('pbs', $pb);
    }
}
