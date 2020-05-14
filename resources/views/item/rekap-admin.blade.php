@extends('layouts.admin-sb')

@section('title', 'Rekap | e-Inventory')

@section('label', 'Rekap')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Rekap</h6>
    </div>
    <div class="card-body">
      <div>
        <form method="get" class="row mb-3">
          <div class="col-3">
            <select class="form-control" name="m">
              @php
              $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
              @endphp
              @for($i = 1; $i <= count($months); $i++)
              <option {{ (Request::input('m') == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $months[$i-1] }}</option>
              @endfor
            </select>
          </div>
          <div class="col-2">
          <select class="form-control" name="y">
            @for($i = 2015; $i < 2050; $i++)
            <option {{ (Request::input('y') == $i) ? 'selected': '' }} value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>  
          </div>
          <div class="col-4">
          <button type="submit" class="btn btn-primary">OK</button>  
          </div>
        </form>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Gudang/Lab</th>
              <th>Waktu Rekap</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($lokasi)
            @foreach($lokasi as $lok)
            <tr>
              <td>{{ $lok->nama }}</td>
              @if(isset($lok->rekap))
                @php $hasRekap = false; @endphp
                @foreach($lok->rekap as $rekap)
                  @if(Request::input('y') == date("Y", strtotime($rekap->created_at)) && Request::input('m') == date("n", strtotime($rekap->created_at)))
                  <td>{{ date("d-m-Y H:i", strtotime($rekap->created_at)) }}</td>
                  <td>
                    <a href="{{ url('uploads/rekap/' . $rekap->file) }}" class="btn btn-sm btn-primary">Lihat</a>
                  </td>
                  @php $hasRekap = true; @endphp
                  @endif
                @endforeach
                @if($hasRekap == false)
                <td>-</td>
                <td style="color: red; font-size: .85em">Belum melakukan rekapitulasi</td></td>
                @endif
              @else
              <td>-</td>
              <td style="color: red; font-size: .85em">Belum melakukan rekapitulasi</td>
              @endif
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
