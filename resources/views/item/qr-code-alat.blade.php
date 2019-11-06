<div style="text-align: center">
	{!! QrCode::size(200)->generate('alat/' . $alat->id); !!}
	<h4>{{ $alat->nama }}</h4>
</div>
