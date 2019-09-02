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
			<li class="nav-item {{ Request::is('labor') ? 'active' : '' }}">
				<a class="nav-link" href="index.html">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Alat dan Bahan
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item {{ Request::is('lab/stok*') ? 'active' : '' }}">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Manajemen Stok</span>
				</a>
				<div id="collapseTwo" class="collapse {{ Request::is('lab/stok*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Manajemen stok</h6>
						<a class="collapse-item {{ Request::is('lab/stok/alat') ? 'active' : '' }}" href="{{ route('labor.stok.alat') }}">Stok Alat</a>
						<a class="collapse-item {{ Request::is('lab/stok/bahan') ? 'active' : '' }}" href="{{ route('labor.stok.bahan') }}">Stok Bahan</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item {{ Request::is('lab/kelola*') ? 'active' : '' }}">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-wrench"></i>
					<span>Kelola Alat & Bahan</span>
				</a>
				<div id="collapseUtilities" class="collapse {{ Request::is('lab/kelola*') ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Kelola Alat & Bahan</h6>
						<a class="collapse-item {{ Request::is('lab/kelola/item-masuk') ? 'active' : '' }}" href="{{ route('labor.kelola.item-masuk') }}">Alat & Bahan Masuk</a>
						<a class="collapse-item {{ Request::is('lab/kelola/alat-keluar') ? 'active' : '' }}" href="{{ route('labor.kelola.alat-keluar') }}">Alat Keluar</a>
						<a class="collapse-item {{ Request::is('lab/kelola/bahan-keluar') ? 'active' : '' }}" href="{{ route('labor.kelola.bahan-keluar') }}">Bahan Keluar</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Pengajuan
			</div>

			<!-- Nav Item - Pengajuan -->
			<li class="nav-item {{ Request::is('lab/pengusulan') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('labor.pengusulan') }}">
					<i class="fas fa-fw fa-table"></i>
					<span>Usulan</span>
				</a>
			</li>

			<!-- Nav Item - Pengajuan -->
			<li class="nav-item {{ Request::is('lab/pengajuan') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('labor.pengajuan') }}">
					<i class="fas fa-fw fa-table"></i>
					<span>Ajuan</span>
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

	@yield('scripts')

</body>
</html>