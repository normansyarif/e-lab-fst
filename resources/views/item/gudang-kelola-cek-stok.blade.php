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

      <form method="post" action="{{ route('pengajuan.dekanat.post') }}" onsubmit="return validate(this);">
        @csrf

        <div class="row">

          <div class="add-dist col-md-4">
            <label class="mb-3">Stok tersedia</label>

            <div class="dist-alat-wrapper">

              @if($pAlats)
              @foreach($pAlats as $pAlat)
              <div>
                <label><strong>{{ $pAlat->alat->nama }}</strong>, dibutuhkan {{ $pAlat->jumlah }} buah. <a class="tolak-btn" href="#" data-toggle="modal" data-target="#pesanDitolak">Tolak</a></label>
                <table class="table table-responsive">
                  <tr>
                    <th>Pemilik</th>
                    <th>Stok</th>
                    <th></th>
                  </tr>
                  
                  @if($pAlat->alat->stoks)
                  @foreach($pAlat->alat->stoks as $stok)
                  <tr>
                    <td>{{ $stok->user->name }}</td>
                    <td>{{ $stok->stok }}</td>
                    <td><button type="button" class="btn btn-info btn-sm">Pilih</button></td>
                  </tr>
                  @endforeach
                  @endif

                </table>
              </div>
              @endforeach
              @endif

              @if($pBahans)
              @foreach($pBahans as $pBahan)
              <div>
                <label><strong>{{ $pBahan->bahan->nama }}</strong>, dibutuhkan {{ $pBahan->jumlah }} {{ $pBahan->bahan->unit }}. <a class="tolak-btn" href="#" data-toggle="modal" data-target="#pesanDitolak">Tolak</a></label>
                <table class="table table-responsive">
                  <tr>
                    <th>Pemilik</th>
                    <th>Stok</th>
                    <th></th>
                  </tr>
                  
                  @if($pBahan->bahan->stoks)
                  @foreach($pBahan->bahan->stoks as $stok)
                  <tr>
                    <td>{{ $stok->user->name }}</td>
                    <td>{{ $stok->stok }} {{ $pBahan->bahan->unit }}</td>
                    <td><button type="button" class="btn btn-info btn-sm">Pilih</button></td>
                  </tr>
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

              <table class="table table-responsive">
                <tr>
                  <th>Nama Item</th>
                  <th>Pemilik</th>
                  <th>Jumlah</th>
                </tr>
                <tr>
                  <td>Alkohol</td>
                  <td>Lab 1</td>
                  <td>33</td>
                </tr>
                <tr>
                  <td>Alkohol</td>
                  <td>Lab 1</td>
                  <td>33</td>
                </tr>
              </table>

            </div>

            <input type="hidden" name="bahan-counter" id="bahan-counter" value="0" required>

          </div>

          <div class="add-dist col-md-4">
            <label class="mb-3">Alat & bahan ditolak</label>

            <div class="dist-alat-wrapper">

              <table class="table table-responsive">
                <tr>
                  <th>Nama Item</th>
                  <th>Jumlah</th>
                  <th>Pesan</th>
                </tr>
                <tr>
                  <td>Alkohol</td>
                  <td>33</td>
                  <td>Alasan ditolak</td>
                </tr>
                <tr>
                  <td>Alkohol</td>
                  <td>33</td>
                  <td>Alasan ditolak</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="" placeholder="Pesan" class="form-control">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button">Tolak</button>
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

  function validate(form) {
    if($('#alat-counter').val() == 0 && $('#bahan-counter').val() == 0) {
      alert('Mohon isi minimal satu alat atau bahan!');
      return false;
    }
    else {
      return confirm('Lanjutkan?');
    }
  }
</script>
@endsection

