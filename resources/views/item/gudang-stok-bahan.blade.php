@extends('layouts.gudang-sb')

@section('title', 'Stok Bahan | e-Inventory')

@section('label', 'Manajemen Bahan')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <a href="{{ route('jenis.index') }}" class="btn btn-info float-right add-btn-table">Kelola jenis</a>
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Bahan</th>
              <th>Jenis</th>
              <th>Formula</th>
              <th>Berat Molekul</th>
              <th>Kondisi Baik</th>
              <th>Kondisi Buruk</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($bahs)
            @foreach($bahs as $bah)
            <tr>
              <td>{{ $bah->kode }}</td>
              <td>{{ $bah->nama }}</td>
              <td>{{ $bah->jenis->nama }}</td>
              <td>{{ $bah->formula }}</td>
              <td>{{ $bah->berat_molekul }}</td>
              
              @if(isset($bah->stoks))
                  @php $ada = false @endphp
                  @foreach($bah->stoks as $stok)
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

              @if(isset($bah->stoks))
                  @php $ada = false @endphp
                  @foreach($bah->stoks as $stok)
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

              @if(isset($bah->stoks))
                  @php $ada = false @endphp
                  @foreach($bah->stoks as $stok)
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
                <a href="{{ route('qr.code.bahan', $bah->id) }}" class="btn btn-warning btn-sm">QR code</a>
                <a onclick="
                $('.add-stock-hidden-id').val('{{ $bah->id }}');
                $('.add-stock-stok').val('0');
                $('.dalam-unit').html('{{ $bah->unit }}')
                " href="javascript:void(0)" class="btn btn-info btn-sm addStock-btn" data-toggle="modal" data-target="#addStock">Tambah Stok</a>
                <a onclick="
                $('.edit-bahan-hidden-id').val('{{ $bah->id }}');
                $('.edit-bahan-kode').val('{{ $bah->kode }}');
                $('.edit-bahan-name').val('{{ $bah->nama }}');
                $('.edit-bahan-formula').val('{{ $bah->formula }}');
                $('.edit-bahan-berat').val('{{ $bah->berat_molekul }}');
                $('.edit-bahan-unit').val('{{ $bah->unit }}');
                $('#id_jenis_edit').val('{{ $bah->id_jenis }}');
                " href="javascript:void(0)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editBahan">Edit</a>
                <a onclick="if(confirm('Hapus?')) $(this).find('form').submit();" href="javascript:void(0)" class="btn btn-danger btn-sm">Hapus
                  <form action="{{ route('bahan.delete', $bah->id) }}" method="post" style="display: none">
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
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Bahan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <form action="{{ route('bahan.post') }}" method="post">
        <div class="modal-body">
          @csrf
          <input type="text" name="kode" class="form-control mb-3" placeholder="Kode">
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama bahan">
          <input type="text" name="formula" class="form-control mb-3" placeholder="Formula">
          <input type="text" name="berat_molekul" class="form-control mb-3" placeholder="Berat Molekul">
          <input type="text" name="unit" class="form-control mb-3" placeholder="Satuan (misal. ml)">

          <select class="form-control mb-3" name="id_jenis" required>
            <option value="" disabled selected>-- Pilih jenis --</option>
            @if($jens)
            @foreach($jens as $jen)
            <option value="{{ $jen->id }}">{{ $jen->nama }}</option>
            @endforeach
            @endif
          </select>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
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
        <h4 class="modal-title">Tambah Stok (dalam <span class="dalam-unit"></span>)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('bahan.add') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="bahan_id" class="add-stock-hidden-id" required>
          <input id="add-total" type="hidden" name="stok" class="form-control mb-3 add-stock-stok" placeholder="Jumlah stok" required>
          <label>Kondisi baik</label>
          <input id="add-good" type="number" name="stok_baik" class="form-control mb-3 add-stock-stok add-smt" placeholder="Jumlah stok baik" required>
          <label>Kondisi buruk</label>
          <input id="add-bad" type="number" name="stok_buruk" class="form-control mb-3 add-stock-stok add-smt" placeholder="Jumlah stok baik" required>
          <p><strong>Total <span class="add-total">0</span> <span class="dalam-unit"></span></strong></p>
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
<div class="modal fade" id="editBahan">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Bahan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('bahan.edit') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="bahan_id" class="edit-bahan-hidden-id" required>
          <input type="text" name="kode" class="form-control mb-3 edit-bahan-kode" placeholder="Kode" required>
          <input type="text" name="nama" class="form-control mb-3 edit-bahan-name" placeholder="Nama bahan" required>
          <input type="text" name="formula" class="form-control mb-3 edit-bahan-formula" placeholder="Formula" required>
          <input type="text" name="berat_molekul" class="form-control mb-3 edit-bahan-berat" placeholder="Berat Molekul" required>
          <input type="text" name="unit" class="form-control mb-3 edit-bahan-unit" placeholder="Unit" required>
          <select id="id_jenis_edit" class="form-control mb-3" name="id_jenis" required>
            <option value="" disabled selected>-- Pilih Jenis --</option>
            @if($jens)
            @foreach($jens as $jen)
            <option value="{{ $jen->id }}">{{ $jen->nama }}</option>
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
