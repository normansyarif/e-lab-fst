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
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Jumlah</th>
              <th>Tgl. Masuk</th>
            </tr>
          </thead>
          <tbody>
            
            @if($ams)
            @foreach($ams as $am)
            <tr>
              <td>{{ $am->alat->nama }}</td>
              <td>{{ $am->jumlah }}</td>
              <td>{{ date('d-m-Y', strtotime($am->tanggal_masuk)) }}</td>
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
        <h4 class="modal-title">Alat masuk baru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post" action="{{ route('alat.masuk.post') }}">
        @csrf
        <div class="modal-body">

          <select class="cari-alat form-control" required name="id_alat">
            <option value="" disabled>-- Pilih alat --</option>
            @if($alats)
            @foreach($alats as $alat)
            <option value="{{ $alat->id }}">{{ $alat->nama }}</option>
            @endforeach
            @endif
          </select>

          <input type="number" name="jumlah" placeholder="Jumlah" class="form-control mb-3" required>
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
  $('.cari-alat').select2();
</script>
@endsection
