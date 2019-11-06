@extends('layouts.gudang-sb')

@section('title', 'Distribusi | e-Inventory')

@section('label', 'Cek Stok')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Cek Stok</h6>
    </div>
    <div class="card-body">

      <form method="post" action="{{ route('gudang.pengajuan.process') }}" onsubmit="return validate(this);">
        @csrf

        <input type="hidden" name="pengajuan-id" id="pengajuan-id" value="{{ $pengajuan->id }}">
        <input type="hidden" name="forwarded" id="forwarded">
        <input type="hidden" name="rejected" id="rejected"> 

        <div class="row">

          <div class="add-dist col-md-4">
            <label class="mb-3">Stok tersedia</label>

            <div class="dist-alat-wrapper">

              @if($pAlats)
              @foreach($pAlats as $pAlat)
              <div class="item" id="alat-{{ $pAlat->id }}">
                <label><strong>{{ $pAlat->alat->nama }}</strong>, {{ $pengajuan->jenis_ajuan == 1 ? 'diminta' : 'dipinjam' }} {{ $pAlat->jumlah }} buah. <a class="tolak-btn" href="javascript:void(0)" onclick="
                $('#ref_nama').val('{{ $pAlat->alat->id }}');
                $('#nama').val('{{ $pAlat->alat->nama }}');
                $('#tolak-id').val('alat-{{ $pAlat->id }}');
                $('#jumlah').val('{{ $pAlat->jumlah }}');
                $('#tipe').val('Alat');
                " data-toggle="modal" data-target="#pesanDitolak">Tolak</a></label>
                <table class="table table-responsive">
                  <tr>
                    <th>Pemilik</th>
                    <th>Stok</th>
                    <th></th>
                  </tr>
                  
                  @if($pAlat->alat->stoks)
                  @foreach($pAlat->alat->stoks as $stok)
                  @if($stok->user->id != $pengajuan->id_pengaju)
                  @if($pAlat->jumlah <= $stok->baik)
                  <tr>
                    <td>{{ $stok->user->nama }}</td>
                    <td>{{ $stok->stok }}</td>
                    <td><button ref-nama="{{ $pAlat->alat->id }}" nama="{{ $pAlat->alat->nama }}" ref-pemilik="{{ $stok->user->id }}" pemilik="{{ $stok->user->nama }}" jumlah="{{ $pAlat->jumlah }}" tipe="Alat" type="button" class="btn btn-info btn-sm select-btn"><span class="fa fa-check"></span></button></td>
                  </tr>
                  @endif
                  @endif
                  @endforeach
                  @endif

                </table>
              </div>
              @endforeach
              @endif

              @if($pBahans)
              @foreach($pBahans as $pBahan)
              <div class="item" id="bahan-{{ $pBahan->id }}">
                <label><strong>{{ $pBahan->bahan->nama }}</strong>, dibutuhkan {{ $pBahan->jumlah }} {{ $pBahan->bahan->unit }}. <a class="tolak-btn" href="javascript:void(0)" onclick="
                $('#ref_nama').val('{{ $pBahan->bahan->id }}');
                $('#nama').val('{{ $pBahan->bahan->nama }}');
                $('#tolak-id').val('bahan-{{ $pBahan->id }}');
                $('#jumlah').val('{{ $pBahan->jumlah }}');
                $('#tipe').val('Bahan');
                " data-toggle="modal" data-target="#pesanDitolak">Tolak</a></label>
                <table class="table table-responsive">
                  <tr>
                    <th>Pemilik</th>
                    <th>Stok</th>
                    <th></th>
                  </tr>
                  
                  @if($pBahan->bahan->stoks)
                  @foreach($pBahan->bahan->stoks as $stok)
                  @if($stok->user->id != $pengajuan->id_pengaju)
                  @if($pBahan->jumlah <= $stok->baik)
                  <tr>
                    <td>{{ $stok->user->nama }}</td>
                    <td>{{ $stok->stok }} {{ $pBahan->bahan->unit }}</td>
                    <td><button ref-nama="{{ $pBahan->bahan->id }}" nama="{{ $pBahan->bahan->nama }}" ref-pemilik="{{ $stok->user->id }}" pemilik="{{ $stok->user->nama }}" jumlah="{{ $pBahan->jumlah }}" tipe="Bahan" type="button" class="btn btn-info btn-sm select-btn"><span class="fa fa-check"></span></button></td>
                  </tr>
                  @endif
                  @endif
                  @endforeach
                  @endif

                </table>
              </div>
              @endforeach
              @endif

            </div>

            <input type="hidden" name="alat-counter" id="alat-counter" value="0" required>

          </div>

          <div class="add-dist col-md-4">
            <label class="mb-3">Alat & bahan diteruskan</label>

            <div class="dist-alat-wrapper">

              <table class="table table-responsive table-forward">
                <tr>
                  <th>Nama Item</th>
                  <th>Pemilik</th>
                  <th>Tipe</th>
                  <th>Jumlah</th>
                  <th></th>
                </tr>
              </table>

            </div>

            <input type="hidden" name="bahan-counter" id="bahan-counter" value="0" required>

          </div>

          <div class="add-dist col-md-4">
            <label class="mb-3">Alat & bahan ditolak</label>

            <div class="dist-alat-wrapper">

              <table class="table table-responsive table-tolak">
                <tr>
                  <th>Item</th>
                  <th>Tipe</th>
                  <th>Jumlah</th>
                  <th>Alasan</th>
                  <th></th>
                </tr>
              </table>

            </div>

            <input type="hidden" name="bahan-counter" id="bahan-counter" value="0" required>

          </div>

          <div class="col-md-12">
            <div class="col text-center">
              <button type="submit" class="btn btn-success">Selesai</button>
            </div>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>

@section('modals')

<div class="modal fade" id="pesanDitolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="pesan" placeholder="Alasan" class="form-control">
        <input type="hidden" id="nama">
        <input type="hidden" id="tolak-id">
        <input type="hidden" id="ref_nama">
        <input type="hidden" id="jumlah">
        <input type="hidden" id="tipe">
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-secondary btn-tolak" type="button">Tolak</button>
      </div>
    </div>
  </div>
</div>

@endsection

@endsection

@section('scripts')
<script type="text/javascript">

  $('select').select2();

  $('.add-alat-btn').click(function() {
    var alatCounter = $('#alat-counter').val();
    
    if(alatCounter < 10) {
      var toShow = parseInt(alatCounter) + 1;
      $('#alat-counter').val(toShow);
      $('#add-alat-item-' + toShow).removeClass('hide');
    }
  });

  $('.add-bahan-btn').click(function() {
    var bahanCounter = $('#bahan-counter').val();
    
    if(bahanCounter < 10) {
      var toShow = parseInt(bahanCounter) + 1;
      $('#bahan-counter').val(toShow);
      $('#add-bahan-item-' + toShow).removeClass('hide');
    }
  });

  $('.select-btn').click(function() {
    var id = $(this).parent().parent().parent().parent().parent().attr('id');
    var nama = $(this).attr('nama');
    var ref_nama = $(this).attr('ref-nama');
    var pemilik = $(this).attr('pemilik');
    var ref_pemilik = $(this).attr('ref-pemilik');
    var jumlah = $(this).attr('jumlah');
    var tipe = $(this).attr('tipe');
    $('.table-forward').append('<tr><td ref="'+ref_nama+'">' + nama + '</td><td ref="'+ ref_pemilik+'">' + pemilik + '</td><td ref="'+ tipe +'">' + tipe + '</td><td ref="'+ jumlah +'">' + jumlah + '</td><td ref=""><button type="button" onclick="show(\''+id+'\', this)" class="btn btn-sm btn-danger btn-show"><span class="fa fa-times"></span></button></td></tr>');
    $(this).parent().parent().parent().parent().parent().hide();
  });

  $('.btn-tolak').click(function() {
    var ref_nama = $('#ref_nama').val();
    var nama = $('#nama').val();
    var pesan = $('#pesan').val();
    var id = $('#tolak-id').val();
    var jumlah = $('#jumlah').val();
    var tipe = $('#tipe').val();
    $('.table-tolak').append('<tr><td ref="'+ref_nama+'">' + nama + '</td><td ref="'+tipe+'">' + tipe + '</td><td ref="'+jumlah+'">' + jumlah + '</td><td ref="'+pesan+'">' + pesan + '</td><td ref=""><button type="button" onclick="show(\''+id+'\', this)" class="btn btn-sm btn-danger btn-show"><span class="fa fa-times"></span></button></td></tr>');
    $('#' + id).hide();
  })

  function show(id, e) {
    $('#' + id).show();
    $(e).parent().parent().remove();
  }

  function validate(form) {
    var asked_item_count = parseInt('{{ count($pAlats) }}') + parseInt('{{ count($pBahans) }}');
    var processed_item_count = $('.item[style="display: none;"]').length;
    if(asked_item_count > processed_item_count) {
      alert('Mohon selesaikan terlebih dahulu!');
      return false;
    } else {
      $('#forwarded').val(JSON.stringify(getData('table-forward')));
      $('#rejected').val(JSON.stringify(getData('table-tolak')));
      return confirm('Lanjutkan?');
    }
  }

  function getData(table) {
      var myTableArray = [];
      $("."+ table +" tr").each(function() {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
          tableData.each(function() { arrayOfThisRow.push($(this).attr('ref')); });
          myTableArray.push(arrayOfThisRow);
        }
      });
      return myTableArray;
    }
</script>
@endsection

