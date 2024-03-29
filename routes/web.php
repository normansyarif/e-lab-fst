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
Route::get('/labor/kelola/pengajuan/cek-stok/{id}', 'PengajuanController@cekStokLabor')->name('cekstoklabor.pengajuan');
Route::post('/lab/pengajuan/process', 'PengajuanController@labPengajuanProcess')->name('lab.pengajuan.process');

Route::post('/lab/kelola/permintaan/post', 'PengajuanController@postKeGudang')->name('permintaan.gudang.post');
Route::get('/lab/permintaan', 'PengajuanController@labPermintaan')->name('lab.permintaan');
Route::get('/gudang/upload/pengajuan/{id}', 'PengajuanController@formUpload')->name('form.upload.pengajuan');
Route::post('/gudang/upload/pengajuan/{id}/post', 'PengajuanController@postUpload')->name('post.upload.pengajuan');
Route::post('/return/{id}', 'PengajuanController@returnItem')->name('return.item');

// Kategori & jenis
Route::get('/gudang/kategori', 'ItemController@indexKategori')->name('kategori.index');
Route::post('/gudang/kategori/post', 'ItemController@postKategori')->name('kategori.post');
Route::post('/gudang/kategori/edit', 'ItemController@editKategori')->name('kategori.edit');
Route::post('/gudang/kategori/{id}/delete', 'ItemController@deleteKategori')->name('kategori.delete');
Route::get('/gudang/jenis', 'ItemController@indexJenis')->name('jenis.index');
Route::post('/gudang/jenis/post', 'ItemController@postJenis')->name('jenis.post');
Route::post('/gudang/jenis/edit', 'ItemController@editJenis')->name('jenis.edit');
Route::post('/gudang/jenis/{id}/delete', 'ItemController@deleteJenis')->name('jenis.delete');

// Ajax routes
Route::get('/ajax/cek-stok/alat/{id}', 'ItemController@cekStokAlat')->name('cek.stok.alat');
Route::get('/ajax/cek-stok/bahan/{id}', 'ItemController@cekStokBahan')->name('cek.stok.bahan');
Route::get('/ajax/detail-distribusi/{id_distribusi}', 'DistribusiController@cekDetail')->name('distribusi.detail');
Route::get('/ajax/detail-pengajuan/{id_pengajuan}', 'PengajuanController@cekDetail')->name('pengajuan.detail');

// Admin
Route::get('/admin/lokasi/gudang', 'AdminController@gudang')->name('admin.gudang');
Route::get('/admin/lokasi/labor', 'AdminController@labor')->name('admin.labor');
Route::post('/admin/labor/create', 'AdminController@laborPost')->name('labor.post');
Route::post('/admin/gudang/create', 'AdminController@gudangPost')->name('gudang.post');

Route::get('/admin/users', 'AdminController@users')->name('user.index');
Route::post('/admin/users/post', 'AdminController@postUser')->name('user.post');
Route::post('/admin/users/edit', 'AdminController@editUser')->name('user.edit');
Route::post('/admin/users/{id}/delete', 'AdminController@deleteUser')->name('user.delete');
Route::post('/admin/users/pass', 'AdminController@passwordUser')->name('user.password');
Route::post('/role/update', 'AdminController@updateRole')->name('role.update');
Route::post('/lokasi/{id}/{tipe}/delete', 'AdminController@deleteLokasi')->name('lokasi.delete');
Route::post('/lokasi/edit', 'AdminController@editLokasi')->name('lokasi.edit');

// QRCODE
Route::get('/qr/data/alat/{id}', 'ItemController@showQRAlat')->name('qr.data.alat');
Route::get('/qr/data/bahan/{id}', 'ItemController@showQRBahan')->name('qr.data.bahan');
Route::get('/qr/code/alat/{id}', 'ItemController@codeQRAlat')->name('qr.code.alat');
Route::get('/qr/code/bahan/{id}', 'ItemController@codeQRBahan')->name('qr.code.bahan');

// Rekap
Route::get('/rekap', 'ItemController@rekap')->name('rekap');
Route::get('/rekap/admin', 'ItemController@rekapAdmin')->name('rekap.admin');
Route::get('/rekap/gudanglabor', 'ItemController@rekapGudangLabor')->name('rekap.gudanglabor');
Route::post('/rekap/gudanglabor/{id}', 'ItemController@rekapDelete')->name('rekap.delete');
