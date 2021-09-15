<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Admin Surat Pengajuan Desa Burai" />
	<meta name="description" content="Admin Surat Pengajuan Desa Burai" />
	<meta name="author" content="https://github.com/pujilesmana?tab=repositories" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Login</title>

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
 login-->

		<section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(<?= base_url() ?>assets/dashboard/image/banner1.png);">
			<div class="container">
				<div class="row justify-content-center no-gutters vertical-align">
					<div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-color: white;">
						<div class="login-fancy">
							<img src="<?= base_url() ?>assets/dashboard/image/logo.png" style="width: 280px;margin-left:16px;" alt="">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 bg-white">
						<div class="login-fancy pb-40 clearfix">
							<h3 class="mb-30">Log In To Admin</h3>
							<form action="javascript:void(0)" method="post" id="login">
								<div class="section-field mb-20">
									<label class="mb-10" for="name">User name* </label>
									<input id="name" class="web form-control" type="text" placeholder="User name" name="username" required>
								</div>
								<div class="section-field mb-20">
									<label class="mb-10" for="Password">Password* </label>
									<input id="Password" class="Password form-control" type="password" placeholder="Password" name="password" required>
								</div>
								<button type="submit" class="button"><span>Log in</span><i class="fa fa-check"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--=================================
 login-->

	</div>



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

		$('#login').submit(function() {
			let username = $('[name="username"]').val();
			let password = $('[name="password"]').val();

			$.ajax({
				type: "POST",
				url: base_url + 'Admin/Login/do_login',
				dataType: "JSON",
				data: {
					username: username,
					password: password
				},
				success: function(data) {
					if (data == 1) {
						toastr["success"]("Anda berhasil Login", "Success");
						setTimeout(function() {
							location.href = base_url + "Admin/Pengajuan"
						}, 1500);
					} else {
						toastr["error"]("Username atau Password salah", "Error");
					}
				}
			});
		});
	</script>

</body>

</html>
