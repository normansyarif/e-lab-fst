@if($pas)
<div>
  <label>Alat</label>
  <ol>
    @foreach($pas as $pa)
    <li>{{ $pa->alat->nama }}, {{ $pa->jumlah }} buah</li>
    @endforeach
  </ol>
</div>
@endif

@if($pbs)
<div>
  <label>Bahan</label>
  <ol>
    @foreach($pbs as $pb)
    <li>{{ $pb->bahan->nama }}, {{ $pb->jumlah }} {{ $pb->bahan->unit }}</li>
    @endforeach
  </ol>
</div>
@endif
