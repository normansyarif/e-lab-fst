@extends('layouts.gudang-sb')

@section('title', 'Kelola Kategori | e-Inventory')

@section('label', 'Kelola Kategori')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addKategori"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kategori</th>
              <th>Jumlah Item</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($kats)
            @foreach($kats as $kat)
            <tr>
              <td>{{ $kat->nama }}</td>
              <td>{{ count($kat->alat) }}</td>
              <td>
                <button onclick="
                $('#id_kategori').val('{{ $kat->id }}');
                $('#nama_kategori').val('{{ $kat->nama }}');
                " data-toggle="modal" data-target="#editKategori" class="btn btn-sm btn-primary">Edit</button>
                <button onclick="
                if(confirm('Yakin?')) {
                  $(this).find('form').submit();
                }
                " class="btn btn-sm btn-danger">Hapus
                <form method="post" id="kat-delete" action="{{ route('kategori.delete', $kat->id) }}">
                  @csrf
                </form>
              </button>
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
<div class="modal fade" id="addKategori">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('kategori.post') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama kategori" required>
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
<div class="modal fade" id="editKategori">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Kategori</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('kategori.edit') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_kategori" id="id_kategori" required>
          <input type="text" name="nama_kategori" id="nama_kategori" class="form-control mb-3" placeholder="Nama kategori" required>
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
