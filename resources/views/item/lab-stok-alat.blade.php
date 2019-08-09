@extends('layouts.labor-sb')

@section('title', 'Stok Alat | e-Inventory')

@section('label', 'Stok Alat')

@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Alat</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Kategori</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>Cair</td>
              <td>55</td>
            </tr>
            <tr>
              <td>Tiger Nixon</td>
              <td>Cair</td>
              <td>55</td>
            </tr>
            <tr>
              <td>Tiger Nixon</td>
              <td>Cair</td>
              <td>55</td>
            </tr>
            <tr>
              <td>Tiger Nixon</td>
              <td>Cair</td>
              <td>55</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
