<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;
use App\Alat;
use App\Distribusi;
use App\User;
use App\DistribusiAlat;
use App\DistribusiBahan;
use App\StokAlat;
use App\StokBahan;
use PDF;
use App\Lokasi;
use App\Pengajuan;

class DistribusiController extends Controller
{
	public function gudangDistribusi() {
        $ajuanSedang = Pengajuan::whereIn('status', [1, 2])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $distSedang = Distribusi::where('status', 1)->where('id_asal', auth()->user()->in_charge->lokasi->id)->count();
		$distribusi = Distribusi::all();
    	return view('item.gudang-kelola-distribusi')->with('distribusis', $distribusi)->with('ajuanSedang', $ajuanSedang)->with('distSedang', $distSedang);
    }

    public function gudangBuatDistribusi() {
        $ajuanSedang = Pengajuan::whereIn('status', [1, 2])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $distSedang = Distribusi::where('status', 1)->where('id_asal', auth()->user()->in_charge->lokasi->id)->count();
    	$alat = Alat::all();
    	$bahan = Bahan::all();
    	$labs = Lokasi::where('tipe', 2)->get();
    	return view('item.gudang-kelola-buat-distribusi')->with('labs', $labs)->with('alats', $alat)->with('bahans', $bahan)->with('ajuanSedang', $ajuanSedang)->with('distSedang', $distSedang);
    }

    public function post(Request $req) {
    	$alatCount = $req->input('alat-counter');
    	$bahanCount = $req->input('bahan-counter');

    	$dist = new Distribusi;
        $dist->id_asal = auth()->user()->in_charge->lokasi->id;
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

    public function printSurat($id) {
        $data = [
            'dist' => Distribusi::find($id)
        ];
        $pdf = PDF::loadView('item.print-distribusi', $data);
        return $pdf->download('surat.pdf');
    }

    public function formUpload($id) {
        $ajuanSedang = Pengajuan::whereIn('status', [1, 2])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $distSedang = Distribusi::where('status', 1)->where('id_asal', auth()->user()->in_charge->lokasi->id)->count();
        return view('item.gudang-form-upload-distribusi')->with('id', $id)->with('ajuanSedang', $ajuanSedang)->with('distSedang', $distSedang);
    }

    public function postUpload(Request $request, $id) {
        $msg = '';
        if($request->hasFile('surat')) {
            $filenameWithExt = $request->file('surat')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('surat')->getClientOriginalExtension();
            $allowedExt = ['jpg', 'png', 'pdf'];
            if(!in_array($ext, $allowedExt)) {
                return redirect(route('form.upload.pengajuan'))->with('error', 'Illegal type of file was uploaded.');
            }else{
                $filenameToStore = $filename . '_' . time() . '.' . $ext;
                $request->file('surat')->move(public_path('uploads/distribusi'), $filenameToStore);
            }
        }else{
            $filenameToStore = null;
        }

        $dist = Distribusi::find($id);
        $dist->surat = $filenameToStore;
        $dist->status = 2;
        $dist->save();

        //Update item
        $dAlats = DistribusiAlat::where('id_distribusi', $id)->get();
        foreach($dAlats as $dAlat){
            $id_tujuan = $dist->id_tujuan;
            $id_asal = $dist->id_asal;
            $id_alat = $dAlat->id_alat;
            $jumlah = $dAlat->jumlah;
            
            // Tambah stok lab
            $stok = StokAlat::where('id_pemilik', $id_tujuan)->where('id_alat', $id_alat)->get()->toArray();
            if(count($stok) > 0) {
                $id_lama = $stok[0]['id'];
                $lama = StokAlat::find($id_lama);
                $lama->baik += $jumlah;
                $lama->stok += $jumlah;
                $lama->save();
            }else{
                $baru = new StokAlat;
                $baru->id_pemilik = $id_tujuan;
                $baru->id_alat = $id_alat;
                $baru->baik = $jumlah;
                $baru->buruk = 0;
                $baru->stok = $jumlah;
                $baru->save();
            }

            // Kurangi stok gudang
            $stok = StokAlat::where('id_pemilik', $id_asal)->where('id_alat', $id_alat)->get()->toArray();
            if(count($stok) > 0) {
                $id_lama = $stok[0]['id'];
                $lama = StokAlat::find($id_lama);
                if($lama->stok >= $jumlah) {
                    if($lama->stok > $jumlah) {
                        $lama->baik -= $jumlah;
                        $lama->stok -= $jumlah;
                        $lama->save();
                    }else{
                        $lama->delete();
                    }
                }else{
                    $msg .= 'Stok ' . $lama->alat->nama . ' tidak berubah karena stok gudang tidak cukup <br>';
                }
            }
        }

        $dBahans = DistribusiBahan::where('id_distribusi', $id)->get();
        foreach($dBahans as $dBahan){
            $id_tujuan = $dist->id_tujuan;
            $id_asal = $dist->id_asal;
            $id_bahan = $dBahan->id_bahan;
            $jumlah = $dBahan->jumlah;
            
            // Tambah stok lab
            $stok = StokBahan::where('id_pemilik', $id_tujuan)->where('id_bahan', $id_bahan)->get()->toArray();
            if(count($stok) > 0) {
                $id_lama = $stok[0]['id'];
                $lama = StokBahan::find($id_lama);
                $lama->baik += $jumlah;
                $lama->stok += $jumlah;
                $lama->save();

            }else{
                $baru = new StokBahan;
                $baru->id_pemilik = $id_tujuan;
                $baru->id_bahan = $id_bahan;
                $baru->baik = $jumlah;
                $baru->buruk = 0;
                $baru->stok = $jumlah;
                $baru->save();
            }

            // Kurangi stok gudang
            $stok = StokBahan::where('id_pemilik', $id_asal)->where('id_bahan', $id_bahan)->get()->toArray();
            if(count($stok) > 0) {
                $id_lama = $stok[0]['id'];
                $lama = StokBahan::find($id_lama);
                if($lama->stok >= $jumlah) {
                    if($lama->stok > $jumlah) {
                        $lama->baik -= $jumlah;
                        $lama->stok -= $jumlah;
                        $lama->save();
                    }else{
                        $lama->delete();
                    }
                }else{
                    $msg .= 'Stok ' . $lama->alat->nama . ' tidak berubah karena stok gudang tidak cukup <br>';
                }
            }
        }

        if($msg != '') {
            return redirect(route('gudang.kelola.distribusi'))->with('success', 'Berhasil mengupload surat');
        }else{
            return redirect(route('gudang.kelola.distribusi'))->with('error', $msg);
        }
    }

    public function laborItemMasuk() {
        $usulanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_pengaju', auth()->user()->in_charge->lokasi->id)->count();
        $ajuanSedang = Pengajuan::whereIn('status', [1,2,3,4])->where('id_teraju', auth()->user()->in_charge->lokasi->id)->count();
        $distSedang = Distribusi::where('status', 1)->where('id_tujuan', auth()->user()->in_charge->lokasi->id)->count();
        $distribusi = Distribusi::where('id_tujuan', auth()->user()->in_charge->lokasi->id)->get();
        return view('item.lab-kelola-item-masuk')->with('distribusis', $distribusi)->with('usulanSedang', $usulanSedang)->with('ajuanSedang', $ajuanSedang)->with('distSedang', $distSedang);
    }
}
