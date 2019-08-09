@extends('layouts.gudang-sb')

@section('title', 'Stok Bahan | e-Inventory')

@section('label', 'Manajemen Alat')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Alat Masuk</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal">Buat</button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Jumlah</th>
              <th>Tgl. Masuk</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>33</td>
              <td>7 Agt 2007 08:00</td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>33</td>
              <td>7 Agt 2007 08:00</td>
            </tr>
            <tr>
              <td>Ashton Cox</td>
              <td>53</td>
              <td>7 Agt 2007 08:00</td>
            </tr>
            <tr>
              <td>Cedric Kelly</td>
              <td>43</td>
              <td>7 Agt 2007 08:00</td>
            </tr>
            <tr>
              <td>Airi Satou</td>
              <td>55</td>
              <td>7 Agt 2007: 08:00</td>
            </tr>
            <tr>
              <td>Brielle Williamson</td>
              <td>55</td>
              <td>7 Agt 2007 08:00</td>
            </tr>
            <tr>
              <td>Herrod Chandler</td>
              <td>55</td>
              <td>7 Agt 2007: 08:00</td>
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
        <h4 class="modal-title">Alat masuk baru</h4>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
      </div>

    </div>
  </div>
</div>

@endsection
