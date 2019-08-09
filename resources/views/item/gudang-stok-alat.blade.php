@extends('layouts.gudang-sb')

@section('title', 'Stok Alat | e-Inventory')

@section('label', 'Manajemen Alat')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Alat</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal">Tambah alat</button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Kategori</th>
              <th>Gudang</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>Cair</td>
              <td>Gudang 1</td>
              <td>55</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Cair</td>
              <td>Gudang 1</td>
              <td>33</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>Ashton Cox</td>
              <td>Cair</td>
              <td>Gudang 2</td>
              <td>23</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>Cedric Kelly</td>
              <td>Padat</td>
              <td>Gudang 2</td>
              <td>33</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>Airi Satou</td>
              <td>Padat</td>
              <td>Gudang 2</td>
              <td>11</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>Brielle Williamson</td>
              <td>Padat</td>
              <td>Gudang 1</td>
              <td>44</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>Herrod Chandler</td>
              <td>Cair</td>
              <td>Gudang 2</td>
              <td>33</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Alat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <input type="text" name="" class="form-control mb-3" placeholder="Nama alat">

          <select class="form-control mb-3">
            <option>-- Pilih kategori --</option>
            <option>Kategori 1</option>
            <option>Kategori 2</option>
            <option>Kategori 3</option>
          </select>

          <select class="form-control mb-3">
            <option>-- Pilih lokasi penyimpanan --</option>
            <option>Gudang 1</option>
            <option>Gudang 2</option>
          </select>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
      </div>

    </div>
  </div>
</div>

@endsection
