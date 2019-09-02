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
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addAlat">Tambah alat</button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($als)
            @foreach($als as $al)
            <tr>
              <td>{{ $al->nama }}</td>
              <td>{{ $al->kategori->nama }}</td>
              
              @if(count($al->stoks) > 0)
              <td>{{ $al->stoks[0]->stok }}</td>
              @else
              <td>0</td>
              @endif
              
              <td>
                <a onclick="
                $('.add-stock-hidden-id').val('{{ $al->id }}');
                $('.add-stock-stok').val('0');
                " href="javascript:void(0)" class="btn btn-info btn-sm addStock-btn" data-toggle="modal" data-target="#addStock">Tambah Stok</a>
                <a onclick="
                $('.edit-alat-hidden-id').val('{{ $al->id }}');
                $('.edit-alat-name').val('{{ $al->nama }}');
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

          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama alat" required>

          <select class="form-control mb-3" name="id_kategori" required>
            <option value="" disabled selected>-- Pilih kategori --</option>
            @if($ks)
            @foreach($ks as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
            @endif
          </select>

          {{-- <select class="form-control mb-3" name="gudang" required>
            <option value="" disabled selected>-- Pilih lokasi penyimpanan --</option>
            @if($gudangs)
            @foreach($gudangs as $gudang)
            <option value="{{ $gudang->nama }}">{{ $gudang->nama }}</option>
            @endforeach
            @endif
          </select> --}}

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
          <input type="number" name="stok" class="form-control mb-3 add-stock-stok" placeholder="Jumlah stok" required>
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
          <input type="text" name="nama" class="form-control mb-3 edit-alat-name" placeholder="Nama alat" required>
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
