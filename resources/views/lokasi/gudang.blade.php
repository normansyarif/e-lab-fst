@extends('layouts.gudang-sb')

@section('title', 'Dashboard Gudang | e-Inventory')

@section('label', 'Kelola Gudang')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Gudang</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal">Tambah</button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Gudang</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
            @if($gudangs)
            @foreach($gudangs as $gudang)
            <tr>
              <td>{{ $gudang->nama }}</td>
              <td>{{ $gudang->lokasi }}</td>
              <td>
                <a href="#" class="btn btn-info btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Gudang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('gudang.post') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama gudang" required>
          <input type="text" name="lokasi" class="form-control mb-3" placeholder="Lokasi" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
      
    </div>
  </div>
</div>

@endsection
