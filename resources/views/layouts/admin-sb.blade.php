<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<!-- Fonts -->
	<link href="{{ asset('vendors/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/google-font.css') }}" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('vendors/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="{{ asset('vendors/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

	{{-- Select2 --}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-darker sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('root') }}">
				<div class="sidebar-brand-icon">
					<img src="{{ asset('images/logo_unja.png') }}">
				</div>
				<div class="sidebar-brand-text mx-1">e-Inventory</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('user.index') }}">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Pengguna</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Lokasi Ruang
			</div>

			<!-- Nav Item - Charts -->
			<li class="nav-item {{ Request::is('admin/lokasi/gudang') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('admin.gudang') }}">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Gudang</span>
				</a>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item {{ Request::is('admin/lokasi/labor') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('admin.labor') }}">
					<i class="fas fa-fw fa-table"></i>
					<span>Laboratorium</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Rekapitulasi
			</div>

			<!-- Nav Item - Pengajuan -->
			<li class="nav-item {{ Request::is('rekap/admin') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('rekap.admin') }}">
					<i class="fas fa-fw fa-table"></i>
					<span>Rekap Stok</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Page Heading -->
					<h1 class="h3 my-3 pl-2 text-gray-800">@yield('label')</h1>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						@include('includes.user-nav')
					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
				@include('includes.message')
				</div>

				@yield('content')

			</div>
			<!-- End of Main Content -->

			@include('includes.footer')

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	@include('includes.logout-modal')

	@yield('modals')

	<!-- Bootstrap core JavaScript-->
	<script src="{{ asset('vendors/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendors/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Core plugin JavaScript-->
	<script src="{{ asset('vendors/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

	<!-- Custom scripts for all pages-->
	<script src="{{ asset('vendors/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

	<!-- Page level plugins -->
	<script src="{{ asset('vendors/sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendors/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

	<!-- Page level custom scripts -->
	<script src="{{ asset('vendors/sb-admin-2/js/demo/datatables-demo.js') }}"></script>

	<!-- Select2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

	@yield('scripts')

</body>
</html>
