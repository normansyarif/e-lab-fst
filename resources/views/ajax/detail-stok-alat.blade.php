<div class="modal-header">
  <h4 class="modal-title">Total stok: <strong>{{ $grandStock }}</strong></h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
  <table class="table table-responsive mb-3">
    <tr>
      <th>Pemilik</th>
      <th>Stok</th>
      <th>Kondisi Baik</th>
      <th>Kondisi Buruk</th>
    </tr>
    @if($stoks)
    @foreach($stoks as $stok)
    <tr>
      <td>{{ $stok->user->nama }}</td>
      <td>{{ $stok->stok }}</td>
      <td>{{ $stok->baik }}</td>
      <td>{{ $stok->buruk }}</td>
    </tr>
    @endforeach
    @endif
  </table>
</div>

<!-- Modal footer -->
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
</div>
