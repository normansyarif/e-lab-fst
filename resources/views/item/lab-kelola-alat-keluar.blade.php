@extends('layouts.labor-sb')

@section('title', 'Alat Keluar | e-Inventory')

@section('label', 'Alat Keluar')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Histori Alat Keluar</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tujuan</th>
              <th>Nama Alat</th>
              <th>Jumlah</th>
              <th>Tgl. Keluar</th>
            </tr>
          </thead>
          <tbody>
            
            @if($keluars)
            @foreach($keluars as $keluar)
            <tr>
              <td>{{ $keluar->tujuan->name }}</td>
              <td>{{ $keluar->alat->nama }}</td>
              <td>{{ $keluar->jumlah }}</td>
              <td>{{ $keluar->tgl_keluar }}</td>
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
