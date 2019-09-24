@extends('layouts.gudang-sb')

@section('title', 'Kelola Jenis | e-Inventory')

@section('label', 'Kelola Jenis')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Jenis</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addJenis"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Jenis</th>
              <th>Jumlah Item</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($jenis)
            @foreach($jenis as $jen)
            <tr>
              <td>{{ $jen->nama }}</td>
              <td>{{ count($jen->bahan) }}</td>
              <td>
                <button onclick="
                $('#id_jenis').val('{{ $jen->id }}');
                $('#nama_jenis').val('{{ $jen->nama }}');
                " data-toggle="modal" data-target="#editJenis" class="btn btn-sm btn-primary">Edit</button>
                <button onclick="
                if(confirm('Yakin?')) {
                  $(this).find('form').submit();
                }
                " class="btn btn-sm btn-danger">Hapus
                <form method="post" action="{{ route('jenis.delete', $jen->id) }}">
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
<div class="modal fade" id="addJenis">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Jenis</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('jenis.post') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama jenis" required>
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
<div class="modal fade" id="editJenis">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Jenis</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('jenis.edit') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_jenis" id="id_jenis" required>
          <input type="text" name="nama_jenis" id="nama_jenis" class="form-control mb-3" placeholder="Nama jenis" required>
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
