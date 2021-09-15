<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Admin Surat Pengajuan Desa Burai" />
	<meta name="description" content="Admin Surat Pengajuan Desa Burai" />
	<meta name="author" content="https://github.com/pujilesmana?tab=repositories" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Admin Desa Burai</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/dashboard/image/logo.png" />

	<!-- Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/style.css" />

</head>

<body>

	<div class="wrapper">

		<!--=================================
 preloader -->

		<div id="pre-loader">
			<img src="<?= base_url() ?>assets/admin/images/pre-loader/loader-01.svg" alt="">
		</div>

		<!--=================================
 preloader -->

		<!--=================================
 header start-->

		<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<!-- logo -->
			<div class="text-left navbar-brand-wrapper">
				<a class="navbar-brand brand-logo" href="<?= base_url() ?>Admin/Pengajuan"><img src="<?= base_url() ?>assets/dashboard/image/logo1.png" style="width: 210px;height: 40px;" alt=""></a>
				<a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>Admin/Pengajuan"><img src="<?= base_url() ?>assets/dashboard/image/logo.png" alt="" style="width: 65px;height: 48px;"></a>
			</div>
			<!-- Top bar left -->
			<ul class="nav navbar-nav mr-auto">
				<li class="nav-item">
					<a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
				</li>
			</ul>
			<!-- top bar right -->
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item fullscreen">
					<a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
				</li>
				<li class="nav-item dropdown mr-30">
					<a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<img src="<?= base_url() ?>assets/admin/images/profile-avatar.jpg" alt="avatar">
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="dropdown-header">
							<div class="media">
								<div class="media-body">
									<h5 class="mt-0 mb-0"><?= $this->session->userdata('nama') ?></h5>
								</div>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url() ?>Admin/Login/do_logout"><i class="text-danger ti-unlock"></i>Logout</a>
					</div>
				</li>
			</ul>
		</nav>

		<!--=================================
 header End-->

		<!--=================================
 Main content -->

		<div class="container-fluid">
			<div class="row">
				<!-- Left Sidebar -->
				<div class="side-menu-fixed">
					<div class="scrollbar side-menu-bg">
						<ul class="nav navbar-nav side-menu" id="sidebarnav">

							<!-- menu item mailbox-->
							<li>
								<a href="<?= base_url() ?>Admin/Pengajuan"><i class="ti-email"></i><span class="right-nav-text">Surat Pengajuan</span></a>
							</li>

						</ul>
					</div>
				</div>
				<!-- Left Sidebar End-->

				<!--=================================
 Main content -->

				<!--=================================
wrapper -->

				<div class="content-wrapper">
					<!-- main body -->
					<div class="row">
						<div class="col-xl-12 mb-30">
							<div class="card card-statistics h-100">
								<div class="card-body">
									<div class="table-responsive">
										<table id="datatable" class="table table-striped table-bordered p-0">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Pengaju</th>
													<th>NIK</th>
													<th>Tanggal Pengajuan</th>
													<th>KTP</th>
													<th>KK</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody class="list-surat">
												<?php
												$no = 0;
												foreach ($data as $i) :
													$id = $i['pengajuan_id'];
													$pengajuan_nama = $i['pengajuan_nama'];
													$pengajuan_nik = $i['pengajuan_nik'];
													$pengajuan_tanggal = $i['pengajuan_tanggal'];
													$pengajuan_ktp = $i['pengajuan_ktp'];
													$pengajuan_kk = $i['pengajuan_kk'];
													$pengajuan_status = $i['pengajuan_status'];

													$no++;
												?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $pengajuan_nama ?></td>
														<td><?= $pengajuan_nik ?></td>
														<td><?= $pengajuan_tanggal ?></td>
														<td class="text-center" data-toggle="tooltip" data-placement="top" title="Lihat KTP <?= $pengajuan_nama ?>"><a href="<?= base_url() ?>assets/dashboard/image/uploads/<?= $pengajuan_ktp ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
														<td class="text-center" data-toggle="tooltip" data-placement="top" title="Lihat KK <?= $pengajuan_nama ?>"><a href="<?= base_url() ?>assets/dashboard/image/uploads/<?= $pengajuan_kk ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
														<td>
															<?php if ($pengajuan_status == 0) : ?>
																<button class="btn btn-success" href="javascript:void(0)" id="publish" data-id="<?= $id ?>">Publish</button>
																<button class="btn btn-danger" href="javascript:void(0)" id="tolak" data-id="<?= $id ?>">Tolak</button>
															<?php elseif ($pengajuan_status == 1) : ?>
																<button class="btn btn-info" href="javascript:void(0)" disabled>Telah dipublish</button>
															<?php elseif ($pengajuan_status == 2) : ?>
																<button class="btn btn-danger" href="javascript:void(0)" disabled>Telah ditolak</button>
															<?php endif; ?>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--================================= wrapper -->
					<div class="modal fade" id="modalPublish" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="modal-title">
										<h4>Publish Surat</h4>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="javascript:void(0)" method="post" id="submitpublishSurat" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<input type="hidden" name="idP">
											<input type="hidden" name="status" value="1">
											<label for="">Upload Surat</label>
											<input class="form-control" type="file" name="surat">
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-success">Publish</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!--================================= wrapper -->
					<div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="modal-title">
										<h4>Tolak Surat</h4>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="javascript:void(0)" method="post" id="submittolakSurat" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label for="">Catatan Penolakan</label>
											<input type="hidden" name="idT">
											<input type="hidden" name="status" value="2">
											<textarea class="form-control" name="catatan" id="" cols="30" rows="10"></textarea>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger">Tolak</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!--================================= footer -->

					<footer class="bg-white p-4">
						<div class="row">
							<div class="col-md-6">
								<div class="text-center text-md-left">
									<p class="mb-0"> &copy; Copyright <span id="copyright">
											<script>
												document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
											</script>
										</span>. <a href="#"> Beguno </a> All Rights Reserved. </p>
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</div>

	<!--=================================
 footer -->



	<!--=================================
 jquery -->

	<!-- jquery -->
	<script src="<?= base_url() ?>assets/admin/js/jquery-3.3.1.min.js"></script>

	<!-- plugins-jquery -->
	<script src="<?= base_url() ?>assets/admin/js/plugins-jquery.js"></script>

	<!-- plugin_path -->
	<script>
		var plugin_path = '<?= base_url() ?>assets/admin/js/';
	</script>

	<!-- chart -->
	<script src="<?= base_url() ?>assets/admin/js/chart-init.js"></script>

	<!-- calendar -->
	<script src="<?= base_url() ?>assets/admin/js/calendar.init.js"></script>

	<!-- charts sparkline -->
	<script src="<?= base_url() ?>assets/admin/js/sparkline.init.js"></script>

	<!-- charts morris -->
	<script src="<?= base_url() ?>assets/admin/js/morris.init.js"></script>

	<!-- datepicker -->
	<script src="<?= base_url() ?>assets/admin/js/datepicker.js"></script>

	<!-- sweetalert2 -->
	<script src="<?= base_url() ?>assets/admin/js/sweetalert2.js"></script>

	<!-- toastr -->
	<script src="<?= base_url() ?>assets/admin/js/toastr.js"></script>

	<!-- validation -->
	<script src="<?= base_url() ?>assets/admin/js/validation.js"></script>

	<!-- lobilist -->
	<script src="<?= base_url() ?>assets/admin/js/lobilist.js"></script>

	<!-- custom -->
	<script src="<?= base_url() ?>assets/admin/js/custom.js"></script>

	<script>
		var base_url = "<?= base_url() ?>";

		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": 100,
			"hideDuration": 300,
			"timeOut": 1400,
			"extendedTimeOut": 1000,
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}

		$('.list-surat').on('click', '#publish', function(params) {
			let id = $(this).attr('data-id');
			$('[name="idP"]').val(id);
			$('#modalPublish').modal('show');
		});

		$('.list-surat').on('click', '#tolak', function(params) {
			let id = $(this).attr('data-id');
			$('[name="idT"]').val(id);
			$('#modalTolak').modal('show');
		});

		$('#submitpublishSurat').submit(function() {
			var form_data = new FormData($('#submitpublishSurat')[0]);

			$.ajax({
				type: "POST",
				url: base_url + 'Admin/Pengajuan/upStatus',
				dataType: "JSON",
				cache: true,
				contentType: false,
				processData: false,
				data: form_data,
				success: function(data) {
					if (data == 1) {
						toastr["success"]("Pengajuan berhasil di publish", "Sukses");
						setTimeout(function() {
							location.href = base_url + "Admin/Pengajuan"
						}, 1500);
					} else if (data == 3) {
						toastr["error"]("Pengajuan gagal dipublish", "Gagal");
					}
				}
			});
		});

		$('#submittolakSurat').submit(function() {
			var form_data = new FormData($('#submittolakSurat')[0]);

			$.ajax({
				type: "POST",
				url: base_url + 'Admin/Pengajuan/upStatus',
				dataType: "JSON",
				cache: true,
				contentType: false,
				processData: false,
				data: form_data,
				success: function(data) {
					if (data == 2) {
						toastr["success"]("Pengajuan berhasil ditolak", "Sukses");
						setTimeout(function() {
							location.href = base_url + "Admin/Pengajuan"
						}, 1500);
					}
				}
			});
		});
	</script>

</body>

</html>
