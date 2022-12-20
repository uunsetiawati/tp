<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $menu ?></title>
	<!-- Ikon -->
	<link rel="shortcut icon" href="<?= base_url() ?>/assets/dist/img/favicon.png">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme stye -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- pace-progress -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
	<!-- Aous -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/aos/aos.css">
	<?php $this->load->view("script/header_function") ?>
	<?php
	if (isset($header_script)) {
		$this->load->view("script/" . $header_script);
	}
	?>

	<!-- Redirect setiap 30 menit -->
	<meta http-equiv="refresh" content="1800">
</head>

<body class="hold-transition layout-top-nav layout-fixed layout-footer-fixed pace-warning">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-green navbar-dark">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h2><?= $menu ?></h2>
							<h1>UPT Pelatihan Koperasi dan UKM Provinsi Jawa Timur x Kampus UMKM Shopee</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
					<hr>
				</div><!-- /.container-fluid -->
				<?php $this->view('message') ?>
			</div>
			<!-- /.content-header -->
			<?= $contents ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
		<!-- Main Footer -->
		<footer class="main-footer d-none d-sm-inline-block">
			<strong>&copy; <?= date("Y") ?></strong> <small><a href="http://fitrahizulfalaq.blogspot.com"> asromat </a></small>
			<div class="float-right d-none d-sm-inline-block">
				<b>TIM IT UPT</b> 
			</div>
		</footer>

		<footer class="main-footer text-center bg-success d-lg-none">
			<div class="row text-white">
				<div class="col"><a class="text-white" href="<?= base_url('publik') ?>"><i class="fas fa-home"></i></a></div>
			</div>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>/assets/dist/js/adminlte.js"></script>

	<!-- OPTIONAL SCRIPTS -->
	<script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>
	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="<?= base_url() ?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/raphael/raphael.min.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

	<!-- pace-progress -->
	<script src="<?= base_url() ?>/assets/plugins/pace-progress/pace.min.js"></script>

	<!-- PAGE SCRIPTS -->
	<script src="<?= base_url() ?>/assets/dist/js/pages/dashboard2.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()
			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			});
		})
	</script>

	<?php $this->load->view("script/footer_function") ?>
	<?php
	if (isset($footer_script)) {
		$this->load->view("script/" . $footer_script);
	}
	?>
</body>

</html>
