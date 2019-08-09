<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function gudangAlat() {
    	return view('item.gudang-stok-alat');
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
