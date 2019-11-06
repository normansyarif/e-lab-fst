@extends('layouts.labor-sb')

@section('title', 'Distribusi | e-Inventory')

@section('label', 'Pengajuan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Buat Pengajuan Gudang</h6>
    </div>
    <div class="card-body">

      <form method="post" action="{{ route('permintaan.gudang.post') }}" onsubmit="return validate(this);">
        @csrf

        <div class="row">

          <div class="col-md-12 mb-4">
            <label>Ajukan</label>
            <select class="form-control" name="tipe" required>
              <option value="1" selected>Permintaan</option>
              <option value="2">Peminjaman</option>
            </select>
            <label>alat/bahan ke</label>
            <select class="form-control" name="gudang-tujuan" required>
              @if($gudangs)
              @foreach($gudangs as $gudang)
              <option value="{{ $gudang->id }}">{{ $gudang->nama }}</option>
              @endforeach
              @endif
            </select>
          </div>

          <div class="add-dist col-md-6">
            <label class="mb-3">Pengajuan Alat</label>

            <div class="dist-alat-wrapper">

              @for($i = 1; $i <= 10; $i++)
              <div class="add-dist-item hide" id="add-alat-item-{{ $i }}">
                <select class="form-control mb-2" name="id_alat_{{ $i }}">
                  <option value="" disabled>-- Pilih alat --</option>

                  @if($alats)
                  @foreach($alats as $alat)
                  <option value="{{ $alat->id }}">{{ $alat->nama }}</option>
                  @endforeach
                  @endif

                </select>
                <input type="number" value="0" name="jumlah_alat_{{ $i }}" placeholder="Jumlah" class="form-control mb-2">
              </div>
              @endfor

            </div>

            <input type="hidden" name="alat-counter" id="alat-counter" value="0" required>
            <button type="button" class="btn btn-sm btn-info add-alat-btn"><i class="fa fa-plus"></i> Tambah Alat</button>

          </div>

          <div class="add-dist col-md-6">
            <label class="mb-3">Pengajuan Bahan</label>

            <div class="dist-alat-wrapper">

              @for($i = 1; $i <= 10; $i++)
              <div class="add-dist-item hide" id="add-bahan-item-{{ $i }}">
                <select class="form-control mb-2" name="id_bahan_{{ $i }}">
                  <option value="" disabled>-- Pilih bahan --</option>

                  @if($bahans)
                  @foreach($bahans as $bahan)
                  <option value="{{ $bahan->id }}">{{ $bahan->nama }} ({{ $bahan->unit }})</option>
                  @endforeach
                  @endif

                </select>
                <input type="number" value="0" name="jumlah_bahan_{{ $i }}" placeholder="Jumlah" class="form-control mb-2">
              </div>
              @endfor

            </div>

            <input type="hidden" name="bahan-counter" id="bahan-counter" value="0" required>
            <button type="button" class="btn btn-sm btn-info add-bahan-btn float-right"><i class="fa fa-plus"></i> Tambah Bahan</button>

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

