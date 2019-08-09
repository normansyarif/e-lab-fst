@extends('layouts.gudang-sb')

@section('title', 'Distribusi | e-Inventory')

@section('label', 'Distribusi')

@section('content')

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Buat Distribusi</h6>
    </div>
    <div class="card-body">

      <div class="row">

        <div class="col-md-12 mb-4">
          <select class="form-control">
            <option>-- Pilih lab tujuan --</option>
            <option>Lab 1</option>
            <option>Lab 2</option>
          </select>
        </div>

        <div class="add-dist col-md-6">
          <label class="mb-3">Distribusi Alat</label>

          <div class="add-dist-item">

            <select class="form-control mb-2">
              <option>-- Pilih alat --</option>
              <option>Alat 1</option>
              <option>Alat 2</option>
            </select>

            <input type="text" name="" placeholder="Jumlah" class="form-control mb-2">
          </div>

          <div class="add-dist-item">

            <select class="form-control mb-2">
              <option>-- Pilih alat --</option>
              <option>Alat 1</option>
              <option>Alat 2</option>
            </select>

            <input type="text" name="" placeholder="Jumlah" class="form-control mb-2">
          </div>

          <button class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Alat</button>

        </div>

        <div class="add-dist col-md-6">
          <label class="mb-3">Distribusi Bahan</label>

          <div class="add-dist-item">

            <select class="form-control mb-2">
              <option>-- Pilih bahan --</option>
              <option>Bahan 1</option>
              <option>Bahan 2</option>
            </select>

            <input type="text" name="" placeholder="Jumlah" class="form-control mb-2">
          </div>

          <button class="btn btn-info btn-sm float-right"><i class="fa fa-plus"></i> Tambah Bahan</button>

        </div>

        <div class="col-md-12">
          <div class="col text-center">
            <button class="btn btn-success">Selesai</button>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

@endsection
