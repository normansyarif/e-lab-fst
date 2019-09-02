@extends('layouts.gudang-sb')

@section('title', 'Distribusi | e-Inventory')

@section('label', 'Distribusi')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Histori Distribusi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <a href="{{ route('gudang.kelola.buat-distribusi') }}" class="btn btn-primary float-right add-btn-table">Buat</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Tujuan</th>
              <th>Jumlah Item</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($distribusis)
            @foreach($distribusis as $distribusi)
            <tr>
              <td>{{ date('d-m-Y', strtotime($distribusi->created_at)) }}</td>
              <td>{{ $distribusi->tujuan->name }}</td>
              <td><a data-toggle="modal" data-target="#itemCountModal" href="#">{{ $distribusi->total_jumlah }}</a></td>
              
              @if($distribusi->status == 1)
              <td>Menunggu validasi</td>
              @elseif($distribusi->status == 2)
              <td>Selesai</td>
              @endif

              <td>
                <a href="#" class="btn btn-primary btn-sm">Cetak surat</a>
                <p class="btn-text-info">(Diserahkan ke {{ $distribusi->tujuan->name }})</p>
              </td>
            </tr>
            @endforeach
            @endif
            {{-- <tr>
              <td>7 Agt 2007 08:00</td>
              <td>Lab 1</td>
              <td><a data-toggle="modal" data-target="#itemCountModal" href="#">3 alat, 1 bahan</a></td>
              <td>Selesai</td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Download surat terima</a>
              </td>
            </tr> --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('modals')

<div class="modal fade" id="itemCountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rincian Item</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <label>Alat</label>
          <ol>
            <li>Alat 1, 33 buah</li>
            <li>Alat 2, 20 buah</li>
          </ol>
        </div>

        <div>
          <label>Bahan</label>
          <ol>
            <li>Bahan 1, 5ml</li>
            <li>Bahan 2, 10ml</li>
          </ol>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

@endsection
