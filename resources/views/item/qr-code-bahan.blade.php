<div style="text-align: center">
	{!! QrCode::size(200)->generate('bahan/' . $bahan->id); !!}
	<h4>{{ $bahan->nama }}</h4>
</div>
