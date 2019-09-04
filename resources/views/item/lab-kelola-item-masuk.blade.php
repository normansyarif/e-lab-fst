@extends('layouts.labor-sb')

@section('title', 'Alat dan Bahan Masuk | e-Inventory')

@section('label', 'Alat dan Bahan Masuk')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Histori Item Masuk</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Asal</th>
              <th>Jumlah</th>
              <th>Jenis</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

            {{-- Distribusi dari gudang --}}
            @if($distribusis)
            @foreach($distribusis as $distribusi)
            <tr>
              <td>{{ date('d-m-Y', strtotime($distribusi->created_at)) }}</td>
              <td>Gudang</td>
              <td><a onclick="cekDistribusi('{{ $distribusi->id }}')" data-toggle="modal" data-target="#itemCountModal" href="javascript:void(0)">{{ $distribusi->total_jumlah }}</a></td>
              <td>Distribusi</td>

              @if($distribusi->status == 1)
              <td>Menunggu validasi</td>
              <td>
                <a href="{{ route('form.upload.distribusi', $distribusi->id) }}" class="btn btn-primary btn-sm">Upload surat</a>
              </td>
              @elseif($distribusi->status == 2)
              <td>Selesai</td>
              <td>
                <a href="{{ url('uploads/distribusi/' . $distribusi->surat) }}" class="btn btn-success btn-sm">Lihat surat</a>
              </td>
              @endif

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
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
      </div>
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

  function cekDistribusi(id_distribusi) {
    jQuery.ajax({
      url: "/ajax/detail-distribusi/" + id_distribusi,
      method: 'get',
      success: function(result){
        $('.modal-body').html(result);
      }});
  }
</script>
@endsection
