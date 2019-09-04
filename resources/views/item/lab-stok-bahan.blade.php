@extends('layouts.labor-sb')

@section('title', 'Stok Bahan | e-Inventory')

@section('label', 'Stok Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Jenis</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            
            @if($stoks)
            @foreach($stoks as $stok)
            <tr>
              <td>{{ $stok->bahan->nama }}</td>
              <td>{{ $stok->bahan->jenis->nama }}</td>
              <td>{{ $stok->stok }} {{ $stok->bahan->unit }}</td>
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
