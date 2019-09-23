@extends('layouts.labor-sb')

@section('title', 'Pengusulan | e-Inventory')

@section('label', 'Pengusulan Alat dan Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengusulan Alat & Bahan ke Gudang atau Lab Lain</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <a href="{{ route('lab.kelola.buat-pengajuan') }}" class="btn btn-primary float-right add-btn-table"><span class="fa fa-plus"></span></a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Pengaju</th>
              <th>Teraju</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Jenis Pengajuan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
            @if($ajuans)
            @foreach($ajuans as $ajuan)
            <tr>
              <td>{{ $ajuan->pengaju->name }}</td>
              <td>{{ $ajuan->teraju->name }}</td>
              <td><a onclick="cekDistribusi('{{ $ajuan->id }}')" data-toggle="modal" data-target="#itemCountModal" href="javascript:void(0)">{{ $ajuan->jumlah }}</a></td>
              <td>{{ date('d-m-Y', strtotime($ajuan->created_at)) }}</td>

              @if($ajuan->jenis_ajuan == 1)
              <td>Permintaan</td>
              @elseif($ajuan->jenis_ajuan == 2)
              <td>Peminjaman</td>
              @endif

              @if($ajuan->status == 1)
              <td>Mengunggu konfirmasi gudang</td>
              <td></td>

              @elseif($ajuan->status == 2)
              <td>Mengunggu validasi gudang</td>
              <td>
                <a title="Cetak surat pengajuan ke gudang" href="{{ route('print.surat.pengajuan', $ajuan->id) }}" class="btn btn-secondary btn-sm">Cetak surat</a>
                <p class="btn-text-info">(Diserahkan ke gudang)</p>
              </td>

              @elseif($ajuan->status == 3)
              <td>Mengunggu konfirmasi {{ $ajuan->teraju->name }}</td>
              <td></td>

              @elseif($ajuan->status == 4)
              <td>Mengunggu validasi {{ $ajuan->teraju->name }}</td>
              <td>
                <a title="Cetak surat pengajuan ke {{ $ajuan->teraju->name }}" href="{{ route('print.surat.pengajuan', $ajuan->id) }}" class="btn btn-secondary btn-sm">Cetak surat</a>
                <p class="btn-text-info">(Diserahkan ke {{ $ajuan->teraju->name }})</p>
              </td>

              @elseif($ajuan->status == 5)
             <td class="text-success">
                <p>Selesai</p>
                <p class="btn-text-info">({{ $ajuan->pesan }})</p>
              </td>
              <td></td>

              @elseif($ajuan->status == 6)
              <td class="text-danger">
                <p>Ditolak</p>
                <p class="btn-text-info">({{ $ajuan->pesan }})</p>
              </td>
              <td></td>
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

  function cekDistribusi(id_pengajuan) {
    jQuery.ajax({
      url: "/ajax/detail-pengajuan/" + id_pengajuan,
      method: 'get',
      success: function(result){
        $('.modal-body').html(result);
      }});
  }
</script>
@endsection
