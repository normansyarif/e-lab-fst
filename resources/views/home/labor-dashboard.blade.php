@extends('layouts.labor-sb')

@section('title', 'Dashboard Laboratorium | e-Inventory')

@section('label', 'Dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usulan Sedang Diajukan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usulan Disetujui</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Usulan Ditolak</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ajuan Permintaan & Peminjaman</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ajuan yang Diterima</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ajuan yang Ditolak</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Stok alat & bahan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jenis</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>Alat</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Alat</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
            <tr>
              <td>Ashton Cox</td>
              <td>Alat</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
            <tr>
              <td>Cedric Kelly</td>
              <td>Padat</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
            <tr>
              <td>Airi Satou</td>
              <td>Bahan</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
            <tr>
              <td>Brielle Williamson</td>
              <td>Bahan</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
            <tr>
              <td>Herrod Chandler</td>
              <td>Bahan</td>
              <td><a data-toggle="modal" data-target="#checkModal" href="">55 ml</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('modals')

<!-- Check stock Modal -->
<div class="modal fade" id="checkModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Stok Alkohol</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label>Stok di gudang</label>
        <table class="table table-responsive mb-3">
          <tr>
            <th>Gudang</th>
            <th>Jumlah</th>
          </tr>
          <tr>
            <td>Gudang 1</td>
            <td>50 ml</td>
          </tr>
        </table>

        <label>Stok di laboratorium</label>
        <table class="table table-responsive mb-3">
          <tr>
            <th>Nama Lab</th>
            <th>Jumlah</th>
          </tr>
          <tr>
            <td>Lab 1</td>
            <td>50 ml</td>
          </tr>
          <tr>
            <td>Lab 5</td>
            <td>150 ml</td>
          </tr>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

@endsection
