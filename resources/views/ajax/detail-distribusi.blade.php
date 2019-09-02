@if($das)
<div>
  <label>Alat</label>
  <ol>
    @foreach($das as $da)
    <li>{{ $da->alat->nama }}, {{ $da->jumlah }} buah</li>
    @endforeach
  </ol>
</div>
@endif

@if($dbs)
<div>
  <label>Bahan</label>
  <ol>
    @foreach($dbs as $db)
    <li>{{ $db->bahan->nama }}, {{ $db->jumlah }} {{ $db->bahan->unit }}</li>
    @endforeach
  </ol>
</div>
@endif
