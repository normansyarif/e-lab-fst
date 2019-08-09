@extends('layouts.gudang-sb')

@section('title', 'Pengajuan | e-Inventory')

@section('label', 'Pengajuan Alat dan Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal">Buat ajuan</button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Pengaju</th>
              <th>Nama Item</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Jenis Pengajuan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lab 3</td>
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
              <td>Lab 3</td>
              <td>Alkohol</td>
              <td>100 ml</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td>Mengunggu validasi gudang</td>
              <td>
                <a title="Upload surat permohonan yang telah ditandatangi oleh staf gudang" href="#" class="btn btn-info btn-sm">Upload surat</a>
              </td>
            </tr>
            <tr>
              <td>Lab 1</td>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td>Mengunggu konfirmasi gudang</td>
              <td>
                <a title="Periksa stok apakah tersedia di gudang atau tidak" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#checkModal">Periksa stok</a>
              </td>
            </tr>
            <tr>
              <td>Lab 4</td>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td>
                <p>Menunggu konfirmasi lab 1</p>
                <p class="btn-text-info">(Pengajuan diteruskan ke lab 1)</p>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>Lab 4</td>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Peminjaman</td>
              <td>Menunggu validasi lab 1</td>
              <td></td>
            </tr>
            <tr>
              <td>Lab 4</td>
              <td>Mikroskop</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td class="text-success">
                <p>Selesai</p>
                <p class="btn-text-info">(Item diambil dari lab 1)</p>
              </td>
              <td>
                <a title="Download surat permohonan" href="#" class="btn btn-success btn-sm">Download surat</a>
              </td>
            </tr>
            <tr>
              <td>Lab 5</td>
              <td>Alkohol</td>
              <td>1</td>
              <td>08-88-2010 08:00</td>
              <td>Permintaan</td>
              <td class="text-success">
                <p>Selesai</p>
                <p class="btn-text-info">(Pengajuan diteruskan ke dekanat)</p>
              </td>
              <td>
                <a title="Cetak surat pengajuan ke dekanat" href="#" class="btn btn-success btn-sm">Cetak surat</a>
                <p class="btn-text-info">(Diserahkan ke dekanat)</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('modals')

<!-- cek stok Modal -->
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
        <label>Stok di gudang</label>
        <table class="table table-responsive mb-3">
          <tr>
            <th>Gudang</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
          <tr>
            <td>Gudang 1</td>
            <td>50 ml</td>
            <td><a title="Ambil stok dari gudang" href="#" class="btn btn-info btn-sm">Konfirmasi</a></td>
          </tr>
        </table>

        <label>Stok di laboratorium</label>
        <table class="table table-responsive mb-3">
          <tr>
            <th>Nama Lab</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
          <tr>
            <td>Lab 1</td>
            <td>50 ml</td>
            <td><a title="Ambil stok dari gudang 1" href="#" class="btn btn-info btn-sm">Teruskan ke Lab 1</a></td>
          </tr>
          <tr>
            <td>Lab 5</td>
            <td>150 ml</td>
            <td><a title="Ambil stok dari gudang 2" href="#" class="btn btn-info btn-sm">Teruskan ke Lab 5</a></td>
          </tr>
        </table>
        <button title="Teruskan pengajuan ke dekanat" type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Teruskan ke dekanat</button>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
      
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ajukan ke dekanat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form>

          <select class="form-control mb-3">
            <option>-- Pilih item --</option>
            <option>Gelas</option>
            <option>Pipet tetes</option>
            <option>Apalah gitu</option>
          </select>

          <input type="number" name="" placeholder="Jumlah" class="form-control">
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
