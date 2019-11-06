@extends('layouts.gudang-sb')

@section('title', 'Stok Alat | e-Inventory')

@section('label', 'Manajemen Alat')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Alat</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <a href="{{ route('kategori.index') }}" class="btn btn-info float-right add-btn-table">Kelola kategori</a>
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addAlat"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Alat</th>
              <th>Kategori</th>
              <th>Kondisi Baik</th>
              <th>Kondisi Buruk</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($als)
            @foreach($als as $al)
            <tr>
              <td>{{ $al->kode }}</td>
              <td>{{ $al->nama }}</td>
              <td>{{ $al->kategori->nama }}</td>

              @if(isset($al->stoks))
                  @php $ada = false @endphp
                  @foreach($al->stoks as $stok)
                    @if($stok->id_pemilik == Auth::user()->in_charge->lokasi->id)
                    <td>{{ $stok->baik }}</td>
                    @php $ada = true @endphp
                    @endif
                  @endforeach
                  @if(!$ada)
                  <td>0</td>
                  @endif
              @else
              <td>0</td>
              @endif

              @if(isset($al->stoks))
                  @php $ada = false @endphp
                  @foreach($al->stoks as $stok)
                    @if($stok->id_pemilik == Auth::user()->in_charge->lokasi->id)
                    <td>{{ $stok->buruk }}</td>
                    @php $ada = true @endphp
                    @endif
                  @endforeach
                  @if(!$ada)
                  <td>0</td>
                  @endif
              @else
              <td>0</td>
              @endif

              @if(isset($al->stoks))
                  @php $ada = false @endphp
                  @foreach($al->stoks as $stok)
                    @if($stok->id_pemilik == Auth::user()->in_charge->lokasi->id)
                    <td>{{ $stok->stok }}</td>
                    @php $ada = true @endphp
                    @endif
                  @endforeach
                  @if(!$ada)
                  <td>0</td>
                  @endif
              @else
              <td>0</td>
              @endif
              
              <td>
                <a href="{{ route('qr.code.alat', $al->id) }}" class="btn btn-warning btn-sm">QR code</a>
                <a onclick="
                $('.add-stock-hidden-id').val('{{ $al->id }}');
                $('.add-stock-stok').val('0');
                " href="javascript:void(0)" class="btn btn-info btn-sm addStock-btn" data-toggle="modal" data-target="#addStock">Tambah Stok</a>
                <a onclick="
                $('.edit-alat-hidden-id').val('{{ $al->id }}');
                $('.edit-alat-kode').val('{{ $al->kode }}');
                $('.edit-alat-name').val('{{ $al->nama }}');
                $('.edit-alat-merk').val('{{ $al->merk }}');
                $('#id_kategori_edit').val('{{ $al->id_kategori }}');
                " href="javascript:void(0)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editAlat">Edit</a>
                <a onclick="if(confirm('Hapus?')) $(this).find('form').submit();" href="javascript:void(0)" class="btn btn-danger btn-sm">Hapus
                <form action="{{ route('alat.delete', $al->id) }}" method="post" style="display: none">
                  @csrf
                </form>
              </a>
              </td>
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
<div class="modal fade" id="addAlat">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Alat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('alat.post') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">

          <input type="text" name="kode" class="form-control mb-3" placeholder="Kode" required>
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama alat" required>
          <input type="text" name="merk" class="form-control mb-3" placeholder="Merk">
          <select class="form-control mb-3" name="id_kategori" required>
            <option value="" disabled selected>-- Pilih kategori --</option>
            @if($ks)
            @foreach($ks as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
            @endif
          </select>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addStock">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Stok</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('alat.add') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="alat_id" class="add-stock-hidden-id" required>
          <input id="add-total" type="hidden" name="stok" class="form-control mb-3 add-stock-stok" placeholder="Jumlah stok" required>
          <label>Kondisi baik</label>
          <input id="add-good" type="number" name="stok_baik" class="form-control mb-3 add-stock-stok add-smt" placeholder="Jumlah stok baik" required>
          <label>Kondisi buruk</label>
          <input id="add-bad" type="number" name="stok_buruk" class="form-control mb-3 add-stock-stok add-smt" placeholder="Jumlah stok baik" required>
          <p><strong>Total <span class="add-total">0</span></strong></p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="editAlat">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Alat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('alat.edit') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="alat_id" class="edit-alat-hidden-id" required>
          <input type="text" name="kode" class="form-control mb-3 edit-alat-kode" placeholder="Kode" required>
          <input type="text" name="nama" class="form-control mb-3 edit-alat-name" placeholder="Nama alat" required>
          <input type="text" name="merk" class="form-control mb-3 edit-alat-merk" placeholder="Merk" >
          <select id="id_kategori_edit" class="form-control mb-3" name="id_kategori" required>
            <option value="" disabled selected>-- Pilih kategori --</option>
            @if($ks)
            @foreach($ks as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
            @endif
          </select>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $('.add-smt').on('input', function() {
    var good = $('#add-good').val();
    var bad = $('#add-bad').val();
    var total = parseInt(good) + parseInt(bad);
    $('.add-total').html(total);
    $('#add-total').val(total);
  });
</script>
@endsection
