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
													<th>Kategori</th>
													<th>Tanggal Pengajuan</th>
													<th>Syarat</th>
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
													$pengajuan_kategori = $i['pengajuan_kategori'];
													$pengajuan_tanggal = $i['tanggal'];
													$pengajuan_file = $i['pengajuan_file'];
													$pengajuan_status = $i['pengajuan_status'];

													$no++;
												?>
													<tr>
														<td><?= $no ?></td>
														<td><?= $pengajuan_nama ?></td>
														<td><?= $pengajuan_nik ?></td>
														<td><?= $pengajuan_kategori ?></td>
														<td><?= $pengajuan_tanggal ?></td>
														<td><button class="btn btn-info" href="javascript:void(0)" id="syarat" data-id="<?= $id ?>" data-kategori="<?= $pengajuan_kategori ?>"><i class="fa fa-eye"></i></button></td>
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

					<div class="modal fade" id="modalSyarat" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="modal-title">
										<h4>Lihat Syarat</h4>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row fileSyarat">

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

		$('.list-surat').on('click', '#syarat', function() {
			const id = $(this).attr('data-id');
			const kategori = $(this).attr('data-kategori');

			$.ajax({
				type: "GET",
				url: base_url + 'Admin/Pengajuan/getFile',
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					const datafilter = JSON.parse(data[0].pengajuan_file);
					if (kategori == "Surat Keterangan Tidak Mampu") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.rumah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Rumah</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);
					} else if (kategori == "Surat Keterangan Tidak Terdaftar Jaminan Sosial") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);
					} else if (kategori == "Surat Domisili") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);
					} else if (kategori == "Surat Keterangan Usaha") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.usaha + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Usaha</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);
					} else if (kategori == "Surat Keterangan Meninggal Dunia") {

						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-5 col-lg-5 mb-30">';
						element += '<div class="file-box">';
						element += '<p style="margin-left:11px;"><b>Tanggal Kematian : ' + datafilter.tanggal_hari_kematian + '</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);
					} else if (kategori == "Surat Keterangan Beda Identitas") {

						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ijazah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Ijazah</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Surat Pengantar Perkawinan") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kkotcl + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Orang Tua Calon Laki-Laki</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kkotcp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Orang Tua Calon Perempuan</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Surat Keterangan Penghasilan") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kktbs + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK yang bersangkutan</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-5 col-lg-5 mb-30">';
						element += '<div class="file-box">';
						element += '<p style="margin-left:11px;"><b>Jumlah Pengahasilan Kotor : ' + datafilter.jmlhpenghasilankotor + '</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Surat Tanah Pengakuan Hak dan Surat Keterangan Tanah") {

						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktp + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.suratpermohonanKD + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Surat Permohonan Kepada Kepala Desa</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.suratpermohonanKD + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Surat Permohonan Kepada Camat</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.suratjualbeli + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Surat Jual Beli/surat hibah/surat keterangan ahli waris (asli)</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Akta kelahiran dan KK") {

						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpayah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP Ayah</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpibu + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP Ibu</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.bukunikah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Buku Nikah</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.suratketeranganlahiranak + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Surat keterangan lahir anak dari bidan/klinik/rumah sakit </b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f107 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.07</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f105 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.05</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f201 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F2.01</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f203 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F2.03</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f204 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F2.04</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Akta kematian dan KK") {

						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto ktp yang akan di buatkan akta kematian</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.kk + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KK</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.skmd + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Surat keterangan meninggal dunia dari Desa</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f107 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.07 </b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f101 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.01</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Penerbitan kartu keluarga hilang / rusak") {

						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpayah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP Ayah</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpibu + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP Ibu</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.bukunikah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Buku Nikah</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f107 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.07</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f102 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.02</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);

					} else if (kategori == "Kartu keluarga baru") {
						var element = '';
						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpayah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP Ayah</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.ktpibu + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto KTP Ibu</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.bukunikah + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto Buku Nikah</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f107 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.07</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f105 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F1.05</b></p>'
						element += '</div></div>';

						element += '<div class="col-xl-2 col-lg-2 mb-30">';
						element += '<div class="file-box">';
						element += '<a href="<?= base_url() ?>assets/dashboard/image/uploads/' + datafilter.f201 + '" target="_blank"><img class="img-fluid mb-1" data-toggle="tooltip" data-placement="top" data-title="KTP" src="<?= base_url() ?>assets/admin/images/file-icon/PNG.png" alt=""></a>';
						element += '<p style="margin-left:11px;"><b>Foto F2.01</b></p>'
						element += '</div></div>';

						$('.fileSyarat').html(element);
					}

					console.log(datafilter);
				}
			});
			$('#modalSyarat').modal('show');
		});
	</script>

</body>

</html>
