@extends('layouts.gudang-sb')

@section('title', 'Distribusi | e-Inventory')

@section('label', 'Upload Surat')

@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Upload surat</h6>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('post.upload.distribusi', $id) }}" enctype="multipart/form-data">
        @csrf
        <label>Upload surat</label>
        <div class="input-group mb-3">
          <input accept=".pdf, .jpg, .png" type="file" class="form-control" placeholder="Upload surat" name="surat" aria-label="Upload surat" aria-describedby="basic-addon2" required>
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">Upload!</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
