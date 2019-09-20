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

Route::get('/gudang/lokasi/gudang', 'LokasiController@gudang')->name('gudang.gudang');
Route::get('/gudang/lokasi/labor', 'LokasiController@labor')->name('gudang.labor');

Route::get('/labor', 'HomeController@laborDashboard')->name('labor.dashboard');
Route::get('/lab/stok/alat', 'ItemController@laborAlat')->name('labor.stok.alat');
Route::get('/lab/stok/bahan', 'ItemController@laborBahan')->name('labor.stok.bahan');
Route::get('/lab/kelola/item-masuk', 'DistribusiController@laborItemMasuk')->name('labor.kelola.item-masuk');

// Pengajuan & pengusulan
Route::get('/lab/pengusulan', 'PengajuanController@laborPengusulan')->name('labor.pengusulan');
Route::get('/lab/pengusulan/buat', 'PengajuanController@laborBuatPengusulan')->name('lab.kelola.buat-pengajuan');
Route::get('/lab/pengajuan', 'PengajuanController@laborPengajuan')->name('labor.pengajuan');

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

// Alat keluar
Route::get('/lab/kelola/alat-keluar', 'AlatKeluarController@laborAlatKeluar')->name('labor.kelola.alat-keluar');

// Bahan keluar
Route::get('/lab/kelola/bahan-keluar', 'BahanKeluarController@laborBahanKeluar')->name('labor.kelola.bahan-keluar');

// Distribusi
Route::get('/gudang/kelola/distribusi', 'DistribusiController@gudangDistribusi')->name('gudang.kelola.distribusi');
Route::get('/gudang/kelola/distribusi/buat', 'DistribusiController@gudangBuatDistribusi')->name('gudang.kelola.buat-distribusi');
Route::post('/gudang/kelola/distribusi/post', 'DistribusiController@post')->name('distribusi.post');
Route::get('/gudang/kelola/distribusi/print/{id}', 'DistribusiController@printSurat')->name('print.surat.distribusi');
Route::get('/distribusi/{id}', 'DistribusiController@formUpload')->name('form.upload.distribusi');
Route::post('/distribusi/{id}/post', 'DistribusiController@postUpload')->name('post.upload.distribusi');

// Pengajuan
Route::get('/gudang/pengajuan', 'PengajuanController@gudangPengajuan')->name('gudang.pengajuan');
Route::get('/gudang/permintaan', 'PengajuanController@gudangPermintaan')->name('gudang.permintaan');
Route::get('/gudang/kelola/pengajuan/buat', 'PengajuanController@gudangBuatPengajuan')->name('gudang.kelola.buat-pengajuan');
Route::post('/gudang/kelola/pengajuan/post', 'PengajuanController@postKeDekanat')->name('pengajuan.dekanat.post');
Route::get('/gudang/kelola/pengajuan/print/{id}', 'PengajuanController@printSurat')->name('print.surat.pengajuan');
Route::get('/gudang/kelola/pengajuan/cek-stok/{id}', 'PengajuanController@cekStok')->name('cekstok.pengajuan');
Route::post('/gudang/pengajuan/process', 'PengajuanController@gudangPengajuanProcess')->name('gudang.pengajuan.process');

Route::post('/lab/kelola/permintaan/post', 'PengajuanController@postKeGudang')->name('permintaan.gudang.post');
Route::get('/lab/permintaan', 'PengajuanController@labPermintaan')->name('lab.permintaan');
Route::get('/gudang/upload/pengajuan/{id}', 'PengajuanController@formUpload')->name('form.upload.pengajuan');
Route::post('/gudang/upload/pengajuan/{id}/post', 'PengajuanController@postUpload')->name('post.upload.pengajuan');

// Ajax routes
Route::get('/ajax/cek-stok/alat/{id}', 'ItemController@cekStokAlat')->name('cek.stok.alat');
Route::get('/ajax/cek-stok/bahan/{id}', 'ItemController@cekStokBahan')->name('cek.stok.bahan');
Route::get('/ajax/detail-distribusi/{id_distribusi}', 'DistribusiController@cekDetail')->name('distribusi.detail');
Route::get('/ajax/detail-pengajuan/{id_pengajuan}', 'PengajuanController@cekDetail')->name('pengajuan.detail');
