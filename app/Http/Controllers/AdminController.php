<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gudang;
use App\Lokasi;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users() {
    	$users = User::where('id', '!=', 0)->get();
    	return view('home.admin-user')->with('users', $users);
    }

    public function postUser(Request $req) {
        $user = new User;
        $user->name = $req->input('nama');
        $user->password = Hash::make($req->input('password'));
        $user->user_no = $req->input('user_no');
        $user->role = 2;
        $user->save();
        return redirect(route('user.index'))->with('success', 'Berhasil menambah pengguna');
    }

    public function deleteUser($id) {
        $user = User::find($id);
		$user->delete();
        return redirect(route('user.index'))->with('success', 'Berhasil menghapus pengguna');
    }

    public function editUser(Request $req) {
        $user = User::find($req->input('id_user'));
        $user->name = $req->input('nama_user');
        $user->save();
        return redirect(route('user.index'))->with('success', 'Berhasil mengubah pengguna');
    }

    public function passwordUser(Request $req) {
        $user = User::find($req->input('id_user'));
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return redirect(route('user.index'))->with('success', 'Berhasil mengubah password');
    }

    public function gudang() {
    	$gudangs = Gudang::all();
    	return view('lokasi.admin-gudang')->with('gudangs', $gudangs);
    }

    public function labor() {
    	$labors = Lokasi::all();
    	return view('lokasi.admin-labor')->with('labors', $labors);
    }

    public function laborPost(Request $req) {
    	$l = new Lokasi;
    	$l->nama = $req->input('nama');
    	$l->lokasi = $req->input('lokasi');
    	$l->save();

    	return redirect(route('admin.labor'))->with('success', 'Berhasil menambah laboratorium');
    }

    public function gudangPost(Request $req) {
        $l = new Gudang;
        $l->nama = $req->input('nama');
        $l->lokasi = $req->input('lokasi');
        $l->save();

        return redirect(route('admin.gudang'))->with('success', 'Berhasil menambah gudang');
    }
}
