@extends('layouts.gudang-sb')

@section('title', 'Stok Bahan | e-Inventory')

@section('label', 'Manajemen Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan Masuk</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Bahan</th>
              <th>Jumlah</th>
              <th>Tgl. Masuk</th>
            </tr>
          </thead>
          <tbody>

            @if($bms)
            @foreach($bms as $bm)
            <tr>
              <td>{{ $bm->bahan->nama }}</td>
              <td>{{ $bm->jumlah }} {{ $bm->bahan->unit }}</td>
              <td>{{ date('d-m-Y', strtotime($bm->tanggal_masuk)) }}</td>
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
        <h4 class="modal-title">Bahan masuk baru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <form method="post" action="{{ route('bahan.masuk.post') }}"> 
        @csrf
        <div class="modal-body">

          <select class="cari-bahan form-control mb-3" name="id_bahan" required>
            <option value="" disabled>-- Pilih bahan --</option>
            
            @if($bahans)
            @foreach($bahans as $bahan)
            <option value="{{ $bahan->id }}">{{ $bahan->nama }}</option>
            @endforeach
            @endif

          </select>

          <input type="number" name="jumlah" value="0" placeholder="Jumlah" class="jumlah form-control mb-3" required>
          <input type="date" name="tanggal" placeholder="Tanggal" class="form-control" required>
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

@section('scripts')
<script type="text/javascript">
  $('.cari-bahan').select2();
</script>
@endsection
