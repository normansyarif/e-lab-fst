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

	<p class="title">Pernyataan Serah Terima<br />Distribusi Alat/Bahan</p>

	<p class="caption">Hari {{ hari(date("D", strtotime($dist->created_at))) }} tanggal {{ date("j", strtotime($dist->created_at)) }} bulan {{ date("n", strtotime($dist->created_at)) }} tahun {{ date("Y", strtotime($dist->created_at)) }} telah dilakukan distribusi alat/bahan kimia praktikum ke {{ $dist->tujuan->nama }} Fakultas Sains dan Teknologi, dengan rincian sebagai berikut:</p>

	@if(count($dist->alats) > 0)
	<label>Rincian alat</label>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Alat</th>
				<th>Nama Alat</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dist->alats as $i => $alat)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $alat->alat->kode }}</td>
				<td>{{ $alat->alat->nama }}</td>
				<td>{{ $alat->jumlah }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif

	@if(count($dist->bahans) > 0)
	<label>Rincian bahan</label>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Bahan</th>
				<th>Nama Bahan</th>
				<th>Formula</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dist->bahans as $i => $bahan)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $bahan->bahan->kode }}</td>
				<td>{{ $bahan->bahan->nama }}</td>
				<td>{{ $bahan->bahan->formula }}</td>
				<td>{{ $bahan->jumlah . ' ' . $bahan->bahan->unit }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif

	<div class="tanggal">
		<p class="tempat">Jambi,</p>
	</div>

	<div class="clear"></div>

	<div class="ttd">
		<div class="ttd-left">
			<p>Yang menyerahkan,</p>
			<hr>
		</div>
		<div class="ttd-spacer">
			<p></p>
		</div>
		<div class="ttd-right">
			<p>Yang menerima,</p>
			<hr>
		</div>
	</div>

</body>
</html>
