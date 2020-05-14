@extends('layouts.gudang-sb')

@section('title', 'Rekap | e-Inventory')

@section('label', 'Rekap')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Rekap</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Periode</th>
              <th>Waktu Rekap</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($pers)
            @foreach($pers as $per)
            <tr>
              <td>{{ date("m/Y", strtotime($per->created_at)) }}</td>
              <td>{{ date("d-m-Y H:i", strtotime($per->created_at)) }}</td>
              <td>
                <a href="{{ url('uploads/rekap/' . $per->file) }}" class="btn btn-sm btn-primary">Lihat</a>
                <button onclick="
                if(confirm('Yakin?')) {
                  $(this).find('form').submit();
                }
                " class="btn btn-sm btn-danger">Hapus
                <form method="post" id="kat-delete" action="{{ route('rekap.delete', $per->id) }}">
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
