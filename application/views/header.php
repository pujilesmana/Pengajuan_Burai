<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="keywords" content="Sistem Pengajuan Surat Desa Burai" />
	<meta name="description" content="Sistem Pengajuan Surat Desa Burai" />
	<meta name="author" content="Beguno" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/dashboard/image/logo.png">
	<title>Desa Burai</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/linericon/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/animate-css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= base_url() ?>">
						<img src="<?= base_url() ?>assets/dashboard/image/logo.png" style="width: 88px; height:70px;" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<?php if ($sidebar == "pengajuan") : ?>
										<li class="nav-item active">
											<a class="nav-link active" href="<?= base_url() ?>">Pengajuan</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url() ?>Download">Download</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="https://desaburai.oganilirkab.go.id/">Official Desa Burai</a>
										</li>
									<?php elseif ($sidebar == "download") : ?>
										<li class="nav-item">
											<a class="nav-link" href="<?= base_url() ?>">Pengajuan</a>
										</li>
										<li class="nav-item active">
											<a class="nav-link" href="<?= base_url() ?>Download">Download</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="https://desaburai.oganilirkab.go.id/">Official Desa Burai</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->
