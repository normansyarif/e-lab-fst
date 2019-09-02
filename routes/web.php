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
Route::get('/gudang/kelola/alat-masuk', 'ItemController@gudangAlatMasuk')->name('gudang.kelola.alat-masuk');
Route::get('/gudang/kelola/bahan-masuk', 'ItemController@gudangBahanMasuk')->name('gudang.kelola.bahan-masuk');
Route::get('/gudang/kelola/distribusi', 'ItemController@gudangDistribusi')->name('gudang.kelola.distribusi');
Route::get('/gudang/kelola/distribusi/buat', 'ItemController@gudangBuatDistribusi')->name('gudang.kelola.buat-distribusi');

Route::get('/gudang/pengajuan', 'AjuUsulController@gudangPengajuan')->name('gudang.pengajuan');

Route::get('/gudang/lokasi/gudang', 'LokasiController@gudang')->name('gudang.gudang');
Route::get('/gudang/lokasi/labor', 'LokasiController@labor')->name('gudang.labor');

Route::get('/labor', 'HomeController@laborDashboard')->name('labor.dashboard');
Route::get('/lab/stok/alat', 'ItemController@laborAlat')->name('labor.stok.alat');
Route::get('/lab/stok/bahan', 'ItemController@laborBahan')->name('labor.stok.bahan');
Route::get('/lab/kelola/item-masuk', 'ItemController@laborItemMasuk')->name('labor.kelola.item-masuk');
Route::get('/lab/kelola/alat-keluar', 'ItemController@laborAlatKeluar')->name('labor.kelola.alat-keluar');
Route::get('/lab/kelola/bahan-keluar', 'ItemController@laborBahanKeluar')->name('labor.kelola.bahan-keluar');

Route::get('/lab/pengusulan', 'AjuUsulController@laborPengusulan')->name('labor.pengusulan');
Route::get('/lab/pengajuan', 'AjuUsulController@laborPengajuan')->name('labor.pengajuan');

Route::post('/post/labor/create', 'LokasiController@laborPost')->name('labor.post');
Route::post('/post/gudang/create', 'LokasiController@gudangPost')->name('gudang.post');

Route::post('/post/alat/post', 'ItemController@postAlat')->name('alat.post');
Route::post('/post/alat/add', 'ItemController@addAlatStock')->name('alat.add');
Route::post('/post/alat/edit', 'ItemController@editAlat')->name('alat.edit');
Route::post('/post/alat/{id}/delete', 'ItemController@deleteAlat')->name('alat.delete');

