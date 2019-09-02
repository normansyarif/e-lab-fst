<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@root')->name('root');
Route::get('/gudang', 'HomeController@gudangDashboard')->name('gudang.dashboard');

Route::get('/gudang/stok/alat', 'ItemController@gudangAlat')->name('gudang.stok.alat');
Route::get('/gudang/stok/bahan', 'ItemController@gudangBahan')->name('gudang.stok.bahan');

Route::get('/gudang/pengajuan', 'AjuUsulController@gudangPengajuan')->name('gudang.pengajuan');

Route::get('/gudang/lokasi/gudang', 'LokasiController@gudang')->name('gudang.gudang');
Route::get('/gudang/lokasi/labor', 'LokasiController@labor')->name('gudang.labor');

Route::get('/labor', 'HomeController@laborDashboard')->name('labor.dashboard');
Route::get('/lab/stok/alat', 'ItemController@laborAlat')->name('labor.stok.alat');
Route::get('/lab/stok/bahan', 'ItemController@laborBahan')->name('labor.stok.bahan');
Route::get('/lab/kelola/item-masuk', 'ItemController@laborItemMasuk')->name('labor.kelola.item-masuk');
Route::get('/lab/kelola/alat-keluar', 'ItemController@laborAlatKeluar')->name('labor.kelola.alat-keluar');
Route::get('/lab/kelola/bahan-keluar', 'ItemController@laborBahanKeluar')->name('labor.kelola.bahan-keluar');

// Pengajuan & pengusulan
Route::get('/lab/pengusulan', 'AjuUsulController@laborPengusulan')->name('labor.pengusulan');
Route::get('/lab/pengajuan', 'AjuUsulController@laborPengajuan')->name('labor.pengajuan');

// Lokasi
Route::post('/post/labor/create', 'LokasiController@laborPost')->name('labor.post');
Route::post('/post/gudang/create', 'LokasiController@gudangPost')->name('gudang.post');

// Stok alat
Route::post('/post/alat/post', 'ItemController@postAlat')->name('alat.post');
Route::post('/post/alat/add', 'ItemController@addAlatStock')->name('alat.add');
Route::post('/post/alat/edit', 'ItemController@editAlat')->name('alat.edit');
Route::post('/post/alat/{id}/delete', 'ItemController@deleteAlat')->name('alat.delete');

// Stok bahan
Route::post('/post/bahan/post', 'ItemController@postBahan')->name('bahan.post');
Route::post('/post/bahan/add', 'ItemController@addBahanStock')->name('bahan.add');
Route::post('/post/bahan/edit', 'ItemController@editBahan')->name('bahan.edit');
Route::post('/post/bahan/{id}/delete', 'ItemController@deleteBahan')->name('bahan.delete');

// Alat masuk
Route::get('/gudang/kelola/alat-masuk', 'AlatMasukController@gudangAlatMasuk')->name('gudang.kelola.alat-masuk');
Route::post('gudang/alat-masuk/post', 'AlatMasukController@post')->name('alat.masuk.post');

// Bahan masuk
Route::get('/gudang/kelola/bahan-masuk', 'BahanMasukController@gudangBahanMasuk')->name('gudang.kelola.bahan-masuk');
Route::post('gudang/bahan-masuk/post', 'BahanMasukController@post')->name('bahan.masuk.post');

// Distribusi
Route::get('/gudang/kelola/distribusi', 'DistribusiController@gudangDistribusi')->name('gudang.kelola.distribusi');
Route::get('/gudang/kelola/distribusi/buat', 'DistribusiController@gudangBuatDistribusi')->name('gudang.kelola.buat-distribusi');
Route::post('/gudang/kelola/distribusi/post', 'DistribusiController@post')->name('distribusi.post');

// Ajax routes
Route::get('/ajax/cek-stok/alat/{id}', 'ItemController@cekStokAlat')->name('cek.stok.alat');
Route::get('/ajax/cek-stok/bahan/{id}', 'ItemController@cekStokBahan')->name('cek.stok.bahan');
Route::get('/ajax/detail-distribusi/{id_distribusi}', 'DistribusiController@cekDetail')->name('distribusi.detail');
