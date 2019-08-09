@extends('layouts.labor-sb')

@section('title', 'Alat Keluar | e-Inventory')

@section('label', 'Alat Keluar')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Histori Alat Keluar</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Alat</th>
              <th>Jumlah</th>
              <th>Tgl. Keluar</th>
              <th>Tujuan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>33</td>
              <td>7 Agt 2007</td>
              <td>Lab. 3</td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>33</td>
              <td>7 Agt 2007</td>
              <td>Lab. 4</td>
            </tr>
            <tr>
              <td>Ashton Cox</td>
              <td>53</td>
              <td>7 Agt 2007</td>
              <td>Lab. 2</td>
            </tr>
            <tr>
              <td>Cedric Kelly</td>
              <td>43</td>
              <td>7 Agt 2007</td>
              <td>Lab. 5</td>
            </tr>
            <tr>
              <td>Herrod Chandler</td>
              <td>55</td>
              <td>7 Agt 2007</td>
              <td>Lab. 1</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
