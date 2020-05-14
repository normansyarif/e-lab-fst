<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lokasi;
use App\Role;
use App\Pengajuan;
use App\Distribusi;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users() {
    	$users = User::all();
        $lokasi = Lokasi::where('nama', '!=', 'Administrator')->where('nama', '!=', 'Dekanat')->get();
    	return view('home.admin-user')->with('users', $users)->with('lokasis', $lokasi);
    }

  //   public function postUser(Request $req) {
  //       $user = new User;
  //       $user->name = $req->input('nama');
  //       $user->password = Hash::make($req->input('password'));
  //       $user->user_no = $req->input('user_no');
  //       $user->role = 2;
  //       $user->save();
  //       return redirect(route('user.index'))->with('success', 'Berhasil menambah pengguna');
  //   }

  //   public function deleteUser($id) {
  //       $user = User::find($id);
		// $user->delete();
  //       return redirect(route('user.index'))->with('success', 'Berhasil menghapus pengguna');
  //   }

  //   public function editUser(Request $req) {
  //       $user = User::find($req->input('id_user'));
  //       $user->name = $req->input('nama_user');
  //       $user->save();
  //       return redirect(route('user.index'))->with('success', 'Berhasil mengubah pengguna');
  //   }

  //   public function passwordUser(Request $req) {
  //       $user = User::find($req->input('id_user'));
  //       $user->password = Hash::make($req->input('password'));
  //       $user->save();
  //       return redirect(route('user.index'))->with('success', 'Berhasil mengubah password');
  //   }

    public function gudang() {
    	$gudangs = Lokasi::where('tipe', 1)->get();
    	return view('lokasi.admin-gudang')->with('gudangs', $gudangs);
    }

    public function labor() {
    	$labors = Lokasi::where('tipe', 2)->get();
    	return view('lokasi.admin-labor')->with('labors', $labors);
    }

    public function laborPost(Request $req) {
    	$l = new Lokasi;
        $l->kode = $req->input('kode');
    	$l->nama = $req->input('nama');
        $l->tipe = 2;
        $l->deskripsi = $req->input('deskripsi');
    	$l->lokasi = $req->input('lokasi');
    	$l->save();

    	return redirect(route('admin.labor'))->with('success', 'Berhasil menambah laboratorium');
    }

    public function gudangPost(Request $req) {
        $l = new Lokasi;
        $l->kode = $req->input('kode');
        $l->nama = $req->input('nama');
        $l->tipe = 1;
        $l->deskripsi = $req->input('deskripsi');
        $l->lokasi = $req->input('lokasi');
        $l->save();

        return redirect(route('admin.gudang'))->with('success', 'Berhasil menambah gudang');
    }

    public function updateRole(Request $req) {
        $id = $req->input('id_user');
        $jabatan = $req->input('jabatan');
        $lokasi = $req->input('lokasi');

        $checkRole = Role::where('user_id', $id)->first();
        if($checkRole) {
            $role = Role::find($checkRole->id);
            if($jabatan == '0') {
                $role->delete();
            }else{
                $role->jabatan = $jabatan;
                $role->lokasi_id = $lokasi;
                $role->save();
            }
            
        }else{
            if($jabatan != '0') {
                $role = new Role;
                $role->user_id = $id;
                $role->jabatan = $jabatan;
                $role->lokasi_id = $lokasi;
                $role->save();
            }
        }
        return redirect(route('user.index'))->with('success', 'Berhasil mengubah role');
        
    }

    public function deleteLokasi($id, $type) {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();
        if($type == 1) {
            return redirect(route('admin.gudang'))->with('success', 'Berhasil menghapus gudang');
        }else{
            return redirect(route('admin.labor'))->with('success', 'Berhasil menghapus labor');
        }
    }

    public function editLokasi(Request $req) {
        $l = Lokasi::find($req->input('id'));
        $l->kode = $req->input('kode');
        $l->nama = $req->input('nama');
        $l->tipe = $req->input('tipe');
        $l->deskripsi = $req->input('deskripsi');
        $l->lokasi = $req->input('lokasi');
        $l->save();
        if($req->input('tipe') == 1) {
            return redirect(route('admin.gudang'))->with('success', 'Berhasil mengubah gudang');
        }else{
            return redirect(route('admin.labor'))->with('success', 'Berhasil mengubah labor');
        }
    }
}
