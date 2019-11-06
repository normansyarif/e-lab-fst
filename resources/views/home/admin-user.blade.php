@extends('layouts.admin-sb')

@section('title', 'Kelola Pengguna | e-Inventory')

@section('label', 'Kelola Pengguna')

@section('content')

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <button class="btn btn-primary float-right add-btn-table" data-toggle="modal" data-target="#addUser"><span class="fa fa-plus"></span></button>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if($users)
            @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              
               @if($user->in_charge)
                @if($user->in_charge->jabatan == 2)
                <td>Kepala</td>
                @elseif($user->in_charge->jabatan == 3)
                <td>Staff</td>
                @elseif($user->in_charge->jabatan == 1)
                <td style="color: red">Administrator</td>
                @else
                <td>-</td>
                @endif
              @else
              <td>-</td>
              @endif

              @if($user->in_charge)
              <td>{{ $user->in_charge->lokasi->nama }}</td>
              @else
              <td>-</td>
              @endif

              <td>
                <button onclick="
                $('#id_untuk_jabatan').val('{{ $user->id }}');
                " data-toggle="modal" data-target="#kasihRole" class="btn btn-sm btn-success">Kelola Role</button>
                {{-- <button onclick="
                $('#id_user_pass').val('{{ $user->id }}');
                " data-toggle="modal" data-target="#ubahPass" class="btn btn-sm btn-info">Password</button>
                <button onclick="
                $('#id_user').val('{{ $user->id }}');
                $('#nama_user').val('{{ $user->name }}');
                " data-toggle="modal" data-target="#editUser" class="btn btn-sm btn-primary">Edit</button>
                <button onclick="
                if(confirm('Yakin?')) {
                  $(this).find('form').submit();
                }
                " class="btn btn-sm btn-danger">Hapus
                <form method="post" action="{{ route('user.delete', $user->id) }}">
                  @csrf
                </form>
              </button> --}}
            </td>
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

@section('modals')
<!-- Add Modal -->
{{-- <div class="modal fade" id="addUser">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('user.post') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Lengkap" required>
          <input type="number" name="user_no" class="form-control mb-3" placeholder="NIP/NIK/NIDK" required>
          <input type="password" name="pass" class="form-control mb-3" placeholder="Password" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div> --}}

<!-- Add Modal -->
{{-- <div class="modal fade" id="editUser">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('user.edit') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_user" id="id_user" required>
          <input type="text" name="nama_user" id="nama_user" class="form-control mb-3" placeholder="Nama Pengguna" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div> --}}

<!-- Add Modal -->
{{-- <div class="modal fade" id="ubahPass">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ubah password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('user.password') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_user" id="id_user_pass" required>
          <input type="password" name="password" id="user_pass" class="form-control mb-3" placeholder="Password baru" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div> --}}

<!-- Add Modal -->
<div class="modal fade" id="kasihRole">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kelola Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('role.update') }}" method="post">
        @csrf

        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="id_user" id="id_untuk_jabatan" required>

          {{-- 1. Kepala
          2. Staff --}}
          <select class="form-control mb-3" name="jabatan">
            <option value="0">-- Tidak ada jabatan --</option>
            <option value="1">Administrator</option>
            <option value="2">Kepala</option>
            <option value="3">Staff</option>
          </select>

          <select class="form-control mb-3" name="lokasi">
            @if($lokasis)
            @foreach($lokasis as $lokasi)
            <option value="{{ $lokasi->id }}">{{ $lokasi->nama }}</option>
            @endforeach
            @endif
          </select>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>
@endsection
