@extends('layouts.labor-sb')

@section('title', 'Pengusulan Alat dan Bahan | e-Inventory')

@section('label', 'Pengusulan Alat dan Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengusulan Alat & Bahan ke Gudang atau Lab Lain</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal">Buat usulan</button>
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
              <td>Permintaan</td>
              <td class="text-success">
                <p>Selesai</p>
                <p class="btn-text-info">(Item diambil dari gudang)</p>
              </td>
              <td>
                <a title="Download surat permohonan" href="#" class="btn btn-success btn-sm">Download surat</a>
              </td>
            </tr>
            <tr>
              <td>Mikroskop</td>
              <td>15</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td class="text-success">
                <p>Selesai</p>
                <p class="btn-text-info">(Item diambil dari lab 3)</p>
              </td>
              <td>
                <a title="Download surat permohonan" href="#" class="btn btn-success btn-sm">Download surat</a>
              </td>
            </tr>
            <tr>
              <td>Alkohol</td>
              <td>100 ml</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td>Mengunggu validasi gudang</td>
              <td>
                <a title="Cetak surat pengajuan ke gudang" href="#" class="btn btn-secondary btn-sm">Cetak surat</a>
                <p class="btn-text-info">(Diserahkan ke gudang)</p>
              </td>
            </tr>
            <tr>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td>Mengunggu konfirmasi gudang</td>
              <td></td>
            </tr>
            <tr>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td>
                <p>Menunggu konfirmasi lab 1</p>
                <p class="btn-text-info">(Pengajuan diteruskan ke lab 1)</p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td>Menunggu validasi lab 1</td>
              <td>
                <a title="Cetak surat pengajuan ke lab 1" href="#" class="btn btn-secondary btn-sm">Cetak surat</a>
                <p class="btn-text-info">(Diserahkan ke lab 1)</p>
              </td>
            </tr>
            <tr>
              <td>Alkohol</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td class="text-danger">
                <p>Ditolak oleh lab 5</p>
                <p class="btn-text-info">Maaf, kami tidak bersedia memberikan stok alkohol kami</p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>Alkohol</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td class="text-success">
                <p>Selesai</p>
                <p class="btn-text-info">(Pengajuan diteruskan ke dekanat)</p>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Buat usulan permintaan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>

          <select class="form-control mb-3">
            <option>-- Pilih Jenis --</option>
            <option>Bahan</option>
            <option>Alat</option>
          </select>

          <select class="form-control mb-3">
            <option>-- Pilih item --</option>
            <option>Gelas</option>
            <option>Pipet tetes</option>
            <option>Apalah gitu</option>
          </select>

          <input type="number" name="" placeholder="Jumlah" class="form-control mb-3">

          <select class="form-control mb-3">
            <option>-- Pilih jenis pengajuan --</option>
            <option>Permintaan</option>
            <option>Peminjaman</option>
          </select>

        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ajukan</button>
      </div>

    </div>
  </div>
</div>

@endsection
