@extends('layouts.labor-sb')

@section('title', 'Pengajuan Alat dan Bahan | e-Inventory')

@section('label', 'Pengajuan Alat dan Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Alat & Bahan dari Lab Lain</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Item</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Jenis</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mikroskop</td>
              <td>15</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td class="text-success">Selesai</td>
              <td>
                <a title="Download surat permohonan" href="#" class="btn btn-success btn-sm">Download surat</a>
                <a href="#" class="btn btn-danger btn-sm mt-1">Permintaan pengembalian</a>
              </td>
            </tr>
            <tr>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td>Menunggu konfirmasi lab 1</td>
              <td>
                <a title="Periksa stok apakah tersedia di gudang atau tidak" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#checkModal">Periksa stok</a>
              </td>
            </tr>
            <tr>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td>Menunggu validasi lab 1</td>
              <td>
                <a href="#" class="btn btn-info btn-sm">Upload surat</a>
              </td>
            </tr>
            <tr>
              <td>Alkohol</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td class="text-danger">
                <p>Ditolak</p>
                <p class="btn-text-info">Maaf, kami tidak bersedia memberikan stok alkohol kami</p>
              </td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('modals')

<!-- check Modal -->
<div class="modal fade" id="checkModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Periksa stok Alkohol</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">

        <p>Lab 5 ingin <strong>meminta</strong> alkohol.</p>
        <p>Jumlah alkohol di lab 1: <strong>50ml</strong>.</p>
        
        <div class="mb-3">
          <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Terima</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tolak</button>
        </div>

        <input type="" name="" placeholder="Pesan (opsional)" class="form-control">
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
      
    </div>
  </div>
</div>

@endsection
