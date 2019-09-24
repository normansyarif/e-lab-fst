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
use App\User;

class PengajuanController extends Controller
{
	public function gudangPengajuan() {
        $p = Pengajuan::where('id_pengaju', auth()->user()->id)->where('id_teraju', 0)->get();
        return view('aju_usul.gudang-pengajuan')->with('ajuans', $p);
    }

    public function gudangPermintaan() {
        $p = Pengajuan::where('id_teraju', '!=', 0)->get();
        return view('aju_usul.gudang-permintaan')->with('ajuans', $p);
    }

    public function laborPengajuan() {
        $p = Pengajuan::where('id_teraju', auth()->user()->id)->whereIn('status', [3, 4, 5, 6])->get();
        return view('aju_usul.lab-pengajuan')->with('ajuans', $p);
    }

    public function gudangBuatPengajuan() {
        $alat = Alat::all();
        $bahan = Bahan::all();
        return view('item.gudang-kelola-buat-pengajuan')->with('alats', $alat)->with('bahans', $bahan);
    }

    public function laborPengusulan() {
        $p = Pengajuan::where('id_pengaju', auth()->user()->id)->get();
        return view('aju_usul.lab-pengusulan')->with('ajuans', $p);
    }

    public function laborBuatPengusulan() {
        $alat = Alat::all();
        $bahan = Bahan::all();
        return view('item.lab-kelola-buat-pengusulan')->with('alats', $alat)->with('bahans', $bahan);
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

public function postKeGudang(Request $req) {
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
    $p->id_pengaju = auth()->user()->id;
    $p->id_teraju = 1;
    $p->jenis_ajuan = $req->input('tipe');
    $p->jumlah = $alatCount . ' alat, ' . $bahanCount . ' bahan';
    $p->status = 1;
    $p->pesan = 'Menunggu konfirmasi gudang';
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

    return redirect(route('labor.pengusulan'))->with('success', 'Berhasil membuat pengusulan ke gudang.');
}

public function printSurat($id) {
    return view('item.print-ajuan')->with('id', $id);
}

public function formUpload($id) {
    return view('item.gudang-form-upload-pengajuan')->with('id', $id);
}

public function postUpload(Request $request, $id) {
    if($request->hasFile('surat')) {
        $filenameWithExt = $request->file('surat')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('surat')->getClientOriginalExtension();
        $allowedExt = ['jpg', 'png', 'pdf'];
        if(!in_array($ext, $allowedExt)) {
            return redirect(route('form.upload.distribusi'))->with('error', 'Illegal type of file was uploaded.');
        }else{
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            $request->file('surat')->move(public_path('uploads/pengajuan'), $filenameToStore);
        }
    }else{
        $filenameToStore = null;
    }

    $pengajuan = Pengajuan::find($id);
    $pengajuan->surat = $filenameToStore;
    $pengajuan->status = 5;
    $pengajuan->pesan = 'Item diambil dari ' . $pengajuan->teraju->name;
    $pengajuan->save();

    $id_pemberi = $pengajuan->id_teraju;
    $id_diberi = $pengajuan->id_pengaju;

        //Update item
    $pAlats = PengajuanAlat::where('id_pengajuan', $id)->get();
    foreach($pAlats as $pAlat){
        $id_alat = $pAlat->id_alat;
        $jumlah = $pAlat->jumlah;

            // Tambah stok lab peminta
        $stok = StokAlat::where('id_pemilik', $id_diberi)->where('id_alat', $id_alat)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->stok += $jumlah;
            $lama->save();
        }else{
            $baru = new StokAlat;
            $baru->id_pemilik = $id_diberi;
            $baru->id_alat = $id_alat;
            $baru->stok = $jumlah;
            $baru->save();
        }

            // Kurangi stok gudang / lab diminta
        $stok = StokAlat::where('id_pemilik', $id_pemberi)->where('id_alat', $id_alat)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->stok -= $jumlah;
            $lama->save();
        }
    }

    $pBahans = PengajuanBahan::where('id_pengajuan', $id)->get();
    foreach($pBahans as $pBahan){
        $id_tujuan = $pengajuan->id_teraju;
        $id_bahan = $pBahan->id_bahan;
        $jumlah = $pBahan->jumlah;

            // Tambah stok lab
        $stok = StokBahan::where('id_pemilik', $id_diberi)->where('id_bahan', $id_bahan)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->stok += $jumlah;
            $lama->save();
        }else{
            $baru = new StokBahan;
            $baru->id_pemilik = $id_tujuan;
            $baru->id_bahan = $id_bahan;
            $baru->stok = $jumlah;
            $baru->save();
        }

            // Kurangi stok gudang
        $stok = StokBahan::where('id_pemilik', $id_pemberi)->where('id_bahan', $id_bahan)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->stok -= $jumlah;
            $lama->save();
        }
    }

    if(auth()->user()->id == 1) {
        return redirect(route('gudang.permintaan'))->with('success', 'Berhasil mengupload surat dan meng-update stok');
    }else{
        return redirect(route('labor.pengajuan'))->with('success', 'Berhasil mengupload surat dan meng-update stok');
    }
}

public function cekStok($id) {
    $pengajuan = Pengajuan::find($id);
    $alat = Alat::all();
    $bahan = Bahan::all();
    $pAlat = PengajuanAlat::where('id_pengajuan', $id)->get();
    $pBahan = PengajuanBahan::where('id_pengajuan', $id)->get();
    return view('item.gudang-kelola-cek-stok')->with('pengajuan', $pengajuan)->with('alats', $alat)->with('bahans', $bahan)->with('pAlats', $pAlat)->with('pBahans', $pBahan);
}

public function cekStokLabor($id) {
    $pengajuan = Pengajuan::find($id);
    $alat = Alat::all();
    $bahan = Bahan::all();
    $pAlat = PengajuanAlat::where('id_pengajuan', $id)->get();
    $pBahan = PengajuanBahan::where('id_pengajuan', $id)->get();
    return view('item.lab-kelola-cek-stok')->with('pengajuan', $pengajuan)->with('alats', $alat)->with('bahans', $bahan)->with('pAlats', $pAlat)->with('pBahans', $pBahan);
}

public function gudangPengajuanProcess(Request $req) {
    $id = $req->input('pengajuan-id');
    $forwarded = json_decode($req->input('forwarded'));
    $rejected = json_decode($req->input('rejected'));

        // Proses permintaan diterima/diteruskan
    $forwardedArr = [];

    foreach($forwarded as $fItem) {
        $lab = $fItem[1];
        $item = $fItem[0];
        $tipe = $fItem[2];
        $jumlah = $fItem[3];

        if(array_key_exists($lab, $forwardedArr)) {
            array_push($forwardedArr[$lab], [$tipe, $item, $jumlah]);
        }else{
            $forwardedArr[$lab] = [[$tipe, $item, $jumlah]];
        }
    };

        //TODO: Hapus pengajuan lama
    $pengajuan = Pengajuan::find($id);
    $idPengaju = $pengajuan->id_pengaju;
    $idTeraju = $pengajuan->id_teraju;
    $tipe = $pengajuan->jenis_ajuan;
    $pAlat = PengajuanAlat::where('id_pengajuan', $id);
    $pBahan = PengajuanBahan::where('id_pengajuan', $id);
    $pAlat->delete();
    $pBahan->delete();
    $pengajuan->delete();

        //Buat pengajuan baru
    foreach($forwardedArr as $key => $forwardItem) {
        $pengajuan = new Pengajuan;
        $pengajuan->id_pengaju = $idPengaju;
        $pengajuan->id_teraju = $key;
        $pengajuan->jenis_ajuan = $tipe;

            // Hitung alat & bahan
        $alat = $bahan = 0;
        for($i=0; $i<count($forwardItem); $i++) {
            if($forwardItem[$i][0] == 'Alat') {
                $alat++;
            }else if($forwardItem[$i][0] == 'Bahan'){
                $bahan++;
            }
        }

        $pengajuan->jumlah = $alat . ' alat, ' . $bahan . ' bahan';

        if($key == 1) {
            $pengajuan->status = 2;
            $pengajuan->pesan = 'Item diambil dari gudang';
        }else{
            $user = User::find($key);
            $pengajuan->status = 3;
            $pengajuan->pesan = 'Menunggu konfirmasi ' . $user->name;
        }

        $pengajuan->save();

            // Insert item pengajuan
        for($i=0; $i<count($forwardItem); $i++) {
            if($forwardItem[$i][0] == 'Alat') {
                $pAlat = new PengajuanAlat;
                $pAlat->id_pengajuan = $pengajuan->id;
                $pAlat->id_alat = $forwardItem[$i][1];
                $pAlat->jumlah = $forwardItem[$i][2];
                $pAlat->save();
            }else if($forwardItem[$i][0] == 'Bahan'){
                $pBahan = new PengajuanBahan;
                $pBahan->id_pengajuan = $pengajuan->id;
                $pBahan->id_bahan = $forwardItem[$i][1];
                $pBahan->jumlah = $forwardItem[$i][2];
                $pBahan->save();
            }
        }

    }

    if(!empty($rejected)) {
        $pengajuan = new Pengajuan;
        $pengajuan->id_pengaju = $idPengaju;
        $pengajuan->id_teraju = $idTeraju;
        $pengajuan->jenis_ajuan = $tipe;

        // Hitung alat & bahan ditolak
        $alat = $bahan = 0;
        $pesan = [];
        for($i=0; $i<count($rejected); $i++) {
            // Index:
            // 0 => Item ID
            // 1 => Alat/bahan
            // 2 => Jumlah
            // 3 => Pesan
            if($rejected[$i][1] == 'Alat') {
                $alat++;
            }else if($rejected[$i][1] == 'Bahan'){
                $bahan++;
            }
            $pesan[] = $rejected[$i][3];
        }

        $pengajuan->jumlah = $alat . ' alat, ' . $bahan . ' bahan';
        $pengajuan->status = 6;
        $pengajuan->pesan = implode(", ", $pesan);
        $pengajuan->save();

        // Insert items
        for($i=0; $i<count($rejected); $i++) {
            // Index:
            // 0 => Item ID
            // 1 => Alat/bahan
            // 2 => Jumlah
            // 3 => Pesan
            if($rejected[$i][1] == 'Alat') {
                $pAlat = new PengajuanAlat;
                $pAlat->id_pengajuan = $pengajuan->id;
                $pAlat->id_alat = $rejected[$i][0];
                $pAlat->jumlah = $rejected[$i][2];
                $pAlat->save();
            }else if($rejected[$i][1] == 'Bahan'){
                $pBahan = new PengajuanBahan;
                $pBahan->id_pengajuan = $pengajuan->id;
                $pBahan->id_bahan = $rejected[$i][0];
                $pBahan->jumlah = $rejected[$i][2];
                $pBahan->save();
            }
        }
    }

    

    return redirect(route('gudang.permintaan'))->with('success', 'Permintaan diproses');
}

public function labPengajuanProcess(Request $req) {
    $id = $req->input('pengajuan-id');
    $forwarded = json_decode($req->input('forwarded'));
    $rejected = json_decode($req->input('rejected'));

    $forwardedArr = [];

    foreach($forwarded as $fItem) {
        $lab = $fItem[1];
        $item = $fItem[0];
        $tipe = $fItem[2];
        $jumlah = $fItem[3];

        if(array_key_exists($lab, $forwardedArr)) {
            array_push($forwardedArr[$lab], [$tipe, $item, $jumlah]);
        }else{
            $forwardedArr[$lab] = [[$tipe, $item, $jumlah]];
        }
    };

    $pengajuan = Pengajuan::find($id);
    $idPengaju = $pengajuan->id_pengaju;
    $idTeraju = $pengajuan->id_teraju;
    $tipe = $pengajuan->jenis_ajuan;
    $pAlat = PengajuanAlat::where('id_pengajuan', $id);
    $pBahan = PengajuanBahan::where('id_pengajuan', $id);
    $pAlat->delete();
    $pBahan->delete();
    $pengajuan->delete();

        //Buat pengajuan baru
    foreach($forwardedArr as $key => $forwardItem) {
        $pengajuan = new Pengajuan;
        $pengajuan->id_pengaju = $idPengaju;
        $pengajuan->id_teraju = $key;
        $pengajuan->jenis_ajuan = $tipe;

            // Hitung alat & bahan
        $alat = $bahan = 0;
        for($i=0; $i<count($forwardItem); $i++) {
            if($forwardItem[$i][0] == 'Alat') {
                $alat++;
            }else if($forwardItem[$i][0] == 'Bahan'){
                $bahan++;
            }
        }

        $pengajuan->jumlah = $alat . ' alat, ' . $bahan . ' bahan';

        $user = User::find($key);
        $pengajuan->status = 4;
        $pengajuan->save();

            // Insert item pengajuan
        for($i=0; $i<count($forwardItem); $i++) {
            if($forwardItem[$i][0] == 'Alat') {
                $pAlat = new PengajuanAlat;
                $pAlat->id_pengajuan = $pengajuan->id;
                $pAlat->id_alat = $forwardItem[$i][1];
                $pAlat->jumlah = $forwardItem[$i][2];
                $pAlat->save();
            }else if($forwardItem[$i][0] == 'Bahan'){
                $pBahan = new PengajuanBahan;
                $pBahan->id_pengajuan = $pengajuan->id;
                $pBahan->id_bahan = $forwardItem[$i][1];
                $pBahan->jumlah = $forwardItem[$i][2];
                $pBahan->save();
            }
        }

    }

    if(!empty($rejected)) {
        $pengajuan = new Pengajuan;
        $pengajuan->id_pengaju = $idPengaju;
        $pengajuan->id_teraju = $idTeraju;
        $pengajuan->jenis_ajuan = $tipe;

        // Hitung alat & bahan ditolak
        $alat = $bahan = 0;
        $pesan = [];
        for($i=0; $i<count($rejected); $i++) {
            if($rejected[$i][1] == 'Alat') {
                $alat++;
            }else if($rejected[$i][1] == 'Bahan'){
                $bahan++;
            }
            $pesan[] = $rejected[$i][3];
        }

        $pengajuan->jumlah = $alat . ' alat, ' . $bahan . ' bahan';
        $pengajuan->status = 6;
        $pengajuan->pesan = implode(", ", $pesan);
        $pengajuan->save();

        for($i=0; $i<count($rejected); $i++) {
            if($rejected[$i][1] == 'Alat') {
                $pAlat = new PengajuanAlat;
                $pAlat->id_pengajuan = $pengajuan->id;
                $pAlat->id_alat = $rejected[$i][0];
                $pAlat->jumlah = $rejected[$i][2];
                $pAlat->save();
            }else if($rejected[$i][1] == 'Bahan'){
                $pBahan = new PengajuanBahan;
                $pBahan->id_pengajuan = $pengajuan->id;
                $pBahan->id_bahan = $rejected[$i][0];
                $pBahan->jumlah = $rejected[$i][2];
                $pBahan->save();
            }
        }
    }

    return redirect(route('labor.pengajuan'))->with('success', 'Permintaan diproses');
}

public function cekDetail($id_pengajuan) {
    $pa = PengajuanAlat::where('id_pengajuan', $id_pengajuan)->get();
    $pb = PengajuanBahan::where('id_pengajuan', $id_pengajuan)->get();
    return view('ajax.detail-ajuan')->with('pas', $pa)->with('pbs', $pb);
}

public function returnItem($id) {
    $ajuan = Pengajuan::find($id);
    $ajuan->pesan = 'Item telah dikembalikan';
    $ajuan->save();

    $id_pemberi = $ajuan->id_pengaju;
    $id_diberi = $ajuan->id_teraju;

        //Update item
    $pAlats = PengajuanAlat::where('id_pengajuan', $id)->get();
    foreach($pAlats as $pAlat){
        $id_alat = $pAlat->id_alat;
        $jumlah = $pAlat->jumlah;

            // Tambah stok lab peminta
        $stok = StokAlat::where('id_pemilik', $id_diberi)->where('id_alat', $id_alat)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->stok += $jumlah;
            $lama->save();
        }else{
            $baru = new StokAlat;
            $baru->id_pemilik = $id_diberi;
            $baru->id_alat = $id_alat;
            $baru->stok = $jumlah;
            $baru->save();
        }

            // Kurangi stok gudang / lab diminta
        $stok = StokAlat::where('id_pemilik', $id_pemberi)->where('id_alat', $id_alat)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokAlat::find($id_lama);
            $lama->stok -= $jumlah;
            $lama->save();
        }
    }

    $pBahans = PengajuanBahan::where('id_pengajuan', $id)->get();
    foreach($pBahans as $pBahan){
        $id_tujuan = $pengajuan->id_teraju;
        $id_bahan = $pBahan->id_bahan;
        $jumlah = $pBahan->jumlah;

            // Tambah stok lab
        $stok = StokBahan::where('id_pemilik', $id_diberi)->where('id_bahan', $id_bahan)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->stok += $jumlah;
            $lama->save();
        }else{
            $baru = new StokBahan;
            $baru->id_pemilik = $id_tujuan;
            $baru->id_bahan = $id_bahan;
            $baru->stok = $jumlah;
            $baru->save();
        }

            // Kurangi stok gudang
        $stok = StokBahan::where('id_pemilik', $id_pemberi)->where('id_bahan', $id_bahan)->get()->toArray();
        if(count($stok) > 0) {
            $id_lama = $stok[0]['id'];
            $lama = StokBahan::find($id_lama);
            $lama->stok -= $jumlah;
            $lama->save();
        }
    }

    return redirect(route('labor.pengusulan'))->with('success', 'Item telah dikembalikan');
}
}
