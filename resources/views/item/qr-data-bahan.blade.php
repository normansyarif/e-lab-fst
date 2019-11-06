<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">
    body {
      padding: 20px;
    }
  </style>
</head>
<body>

  <table class="table">
    <tr>
      <th>Kode</th>
      <td>{{ $bahan->kode }}</td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>{{ $bahan->nama }}</td>
    </tr>
    <tr>
      <th>Formula</th>
      <td>{{ $bahan->formula }}</td>
    </tr>
    <tr>
      <th>Berat Molekul</th>
      <td>{{ $bahan->berat_molekul }}</td>
    </tr>
    <tr>
      <th>Kategori</th>
      <td>{{ $bahan->jenis->nama }}</td>
    </tr>
    <tr>
      <th>Stok</th>
      <td>{{ $grandStock }}</td>
    </tr>
  </table>

  <p>Lokasi persebaran stok:</p>
  <table class="table"> 
    <tr>
      <th>Pemilik</th>
      <th>Stok</th>
    </tr>
    @if($stoks)
    @foreach($stoks as $stok)
    <tr>
      <td>{{ $stok->user->name }}</td>
      <td>{{ $stok->stok }}</td>
    </tr>
    @endforeach
    @endif
  </table>


</body>
</html>
