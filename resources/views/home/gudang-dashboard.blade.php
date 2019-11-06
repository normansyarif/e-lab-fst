@extends('layouts.gudang-sb')

@section('title', 'Gudang | e-Inventory')

@section('label', 'Dashboard')

@section('content')

<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <a href="{{ route('gudang.permintaan') }}" class="card card-link border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ajuan Permintaan & Peminjaman</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ajuanSedang }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <a href="{{ route('gudang.permintaan') }}" class="card card-link border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ajuan yang Diterima</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ajuanDiterima }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <a href="{{ route('gudang.permintaan') }}" class="card card-link border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ajuan yang Direkomendasikan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ajuanDiteruskan }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </a>
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
            @if($alats)
            @foreach($alats as $alat)
            <tr>
              <td>{{ $alat->nama }}</td>
              <td>Alat</td>
              <td><a onclick="cekStokAlat({{ $alat->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#checkModal" href="javascript:void(0)">Cek stok</a></td>
            </tr>
            @endforeach
            @endif

            @if($bahans)
            @foreach($bahans as $bahan)
            <tr>
              <td>{{ $bahan->nama }}</td>
              <td>Bahan</td>
              <td><a onclick="cekStokBahan({{ $bahan->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#checkModal" href="javascript:void(0)">Cek stok</a></td>
            </tr>
            @endforeach
            @endif

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
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

  function cekStokAlat(id_alat) {
    jQuery.ajax({
      url: "/ajax/cek-stok/alat/" + id_alat,
      method: 'get',
      success: function(result){
        $('.modal-content').html(result);
      }});
  }

  function cekStokBahan(id_bahan) {
    jQuery.ajax({
      url: "/ajax/cek-stok/bahan/" + id_bahan,
      method: 'get',
      success: function(result){
        $('.modal-content').html(result);
      }});
  }
</script>
@endsection
