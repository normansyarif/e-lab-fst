<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
			padding: 5px 10px;
		}
		.title {
			font-weight: bold;
			font-size: 1.1em;
			text-align: center;
			padding-bottom: 20px;
		}
		.caption {
			text-align: justify;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		table, th, td {
  			border: 1px solid black;
		}
		.tanggal {
			float: right;
		}
		.clear {
			clear: both;
		}
		.ttd {
			width: 100%;
		}
		.ttd-left {
			width: 25%;
			float: left;
		}
		.ttd-spacer {
			width: 50%;
			float: left;
		}
		.ttd-right {
			width: 25%;
			float: left;
		}
		hr {
			width: 80%;
			text-align: left;
			margin-left: 0;
			margin-top: 70px;
		}
		.tempat {
			margin-right: 130px;
		}
	</style>
</head>
<body>

	<p class="title">Rekapitulasi Stok Alat dan Bahan<br />{{ Auth::user()->in_charge->lokasi->nama }}<br />per {{ date("j F Y", time()) }}</p>

	@if(count($sAlats) > 0)
	<label>Stok alat</label>
	<table>
		<thead>
			<tr>
				<th>Kode</th>
	            <th>Nama Alat</th>
	            <th>Kategori</th>
	            <th>Kondisi Baik</th>
	            <th>Kondisi Buruk</th>
	            <th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sAlats as $sAlat)
            <tr>
              <td>{{ $sAlat->alat->kode }}</td>
              <td>{{ $sAlat->alat->nama }}</td>
              <td>{{ $sAlat->alat->kategori->nama }}</td>
              <td>{{ $sAlat->baik }}</td>
              <td>{{ $sAlat->buruk }}</td>
              <td>{{ $sAlat->stok }}</td>
            </tr>
            @endforeach
		</tbody>
	</table>
	@endif

	@if(count($sBahans) > 0)
	<label>Stok bahan</label>
	<table>
		<thead>
			<tr>
            	<td>Kode</td>
            	<th>Nama Bahan</th>
            	<th>Jenis</th>
            	<th>Formula</th>
            	<th>Berat Molekul</th>
            	<th>Kondisi Baik</th>
            	<th>Kondisi Buruk</th>
            	<th>Jumlah</th>
            </tr>
		</thead>
		<tbody>
			@foreach($sBahans as $sBahan)
            <tr>
            	<td>{{ $sBahan->bahan->kode }}</td>
            	<td>{{ $sBahan->bahan->nama }}</td>
            	<td>{{ $sBahan->bahan->jenis->nama }}</td>
            	<td>{{ $sBahan->bahan->formula }}</td>
            	<td>{{ $sBahan->bahan->berat_molekul }}</td>
            	<td>{{ $sBahan->baik }} {{ $sBahan->bahan->unit }}</td>
            	<td>{{ $sBahan->buruk }} {{ $sBahan->bahan->unit }}</td>
            	<td>{{ $sBahan->stok }} {{ $sBahan->bahan->unit }}</td>
            </tr>
            @endforeach
		</tbody>
	</table>
	@endif

</body>
</html>
