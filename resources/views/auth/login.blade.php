<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-Inventory | Login') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('vendors/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/google-font.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body class="overwrite-bg">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row login-box">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-5">e-Inventory<br /><span class="text-smaller">Fakultas Sains dan Teknologi<br />Universitas Jambi<span class="text-smaller"></h1>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="user">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user @error('user_no') is-invalid @enderror" placeholder="NIDN/NIP/NIM" value="{{ old('email') }}" required autofocus name="user_no" />
                            @error('user_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"  name="password" required id="exampleInputPassword" placeholder="Password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                              <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                              <label class="custom-control-label" for="customCheck">Ingat saya</label>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>

</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendors/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendors/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('vendors/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
