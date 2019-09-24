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
              <th>Nama Bahan</th>
              <th>Jenis</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($bahs)
            @foreach($bahs as $bah)
            <tr>
              <td>{{ $bah->nama }}</td>
              <td>{{ $bah->jenis->nama }}</td>
              
              @if(count($bah->stoks) > 0)
              <td>{{ $bah->stoks[0]->stok }} {{ $bah->unit }}</td>
              @else
              <td>0 {{ $bah->unit }}</td>
              @endif
              
              <td>
                <a onclick="
                $('.add-stock-hidden-id').val('{{ $bah->id }}');
                $('.add-stock-stok').val('0');
                $('.dalam-unit').html('{{ $bah->unit }}')
                " href="javascript:void(0)" class="btn btn-info btn-sm addStock-btn" data-toggle="modal" data-target="#addStock">Tambah Stok</a>
                <a onclick="
                $('.edit-bahan-hidden-id').val('{{ $bah->id }}');
                $('.edit-bahan-name').val('{{ $bah->nama }}');
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
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama bahan">

          <input type="text" name="unit" class="form-control mb-3" placeholder="Satuan (misal. ml)">

          <select class="form-control mb-3" name="id_jenis" required>
            <option value="" disabled selected>-- Pilih jenis --</option>
            @if($jens)
            @foreach($jens as $jen)
            <option value="{{ $jen->id }}">{{ $jen->nama }}</option>
            @endforeach
            @endif
          </select>

          {{-- <select class="form-control mb-3">
            <option>-- Pilih lokasi penyimpanan --</option>
            <option>Gudang 1</option>
            <option>Gudang 2</option>
          </select> --}}

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
          <input type="text" name="nama" class="form-control mb-3 edit-bahan-name" placeholder="Nama bahan" required>
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
