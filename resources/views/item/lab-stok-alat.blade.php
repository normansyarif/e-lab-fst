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
              <th>Kode</th>
              <th>Nama Alat</th>
              <th>Kategori</th>
              <th>Kondisi Baik</th>
              <th>Kondisi Buruk</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            
            @if($stoks)
            @foreach($stoks as $stok)
            <tr>
              <td>{{ $stok->alat->kode }}</td>
              <td>{{ $stok->alat->nama }}</td>
              <td>{{ $stok->alat->kategori->nama }}</td>
              <td>{{ $stok->baik }}</td>
              <td>{{ $stok->buruk }}</td>
              <td>{{ $stok->stok }}</td>
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
