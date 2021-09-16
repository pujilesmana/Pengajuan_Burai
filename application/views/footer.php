<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url() ?>assets/dashboard/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/popper.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/stellar.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/isotope/isotope-min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/vendors/counter-up/jquery.counterup.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/mail-script.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/theme.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#download').DataTable();
	});
	var base_url = "<?= base_url() ?>";

	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "500",
		"timeOut": "1500",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	$(function() {
		$(document).on('click', 'a.page-scroll', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 600, 'easeInOutExpo');
			event.preventDefault();
		});
	});

	$('#SKTM').click(function() {
		$('[name="kategori"]').val('Surat Keterangan Tidak Mampu');
		$('#modalSKTM').modal('show');
	});

	$('#SKTTJS').click(function() {
		$('[name="kategori"]').val('Surat Keterangan Tidak Terdaftar Jaminan Sosial');
		$('#modalSKTTJS').modal('show');
	});

	$('#SD').click(function() {
		$('[name="kategori"]').val('Surat Domisili');
		$('#modalDomisili').modal('show');
	});

	$('#SKU').click(function() {
		$('[name="kategori"]').val('Surat Keterangan Usaha');
		$('#modalSKU').modal('show');
	});

	$('#SKMD').click(function() {
		$('[name="kategori"]').val('Surat Keterangan Meninggal Dunia');
		$('#modalSKMD').modal('show');
	});

	$('#SKBI').click(function() {
		$('[name="kategori"]').val('Surat Keterangan Beda Identitas');
		$('#modalSKBI').modal('show');
	});

	$('#SPP').click(function() {
		$('[name="kategori"]').val('Surat Pengantar Perkawinan');
		$('#modalSPP').modal('show');
	});

	$('#SKP').click(function() {
		$('[name="kategori"]').val('Surat Keterangan Penghasilan');
		$('#modalSKP').modal('show');
	});

	$('#STPHSKT').click(function() {
		$('[name="kategori"]').val('Surat Tanah Pengakuan Hak dan Surat Keterangan Tanah');
		$('#modalSTPHSKT').modal('show');
	});

	$('#aktedankk').click(function() {
		$('[name="kategori"]').val('Akta kelahiran dan KK');
		$('#modalaktedankk').modal('show');
	});

	$('#kematiandankk').click(function() {
		$('[name="kategori"]').val('Akta kematian dan KK');
		$('#modalkematiandankk').modal('show');
	});

	$('#kehilangataurusak').click(function() {
		$('[name="kategori"]').val('Penerbitan kartu keluarga hilang / rusak');
		$('#modalkehilangataurusak').modal('show');
	});

	$('#kkbaru').click(function() {
		$('[name="kategori"]').val('Kartu keluarga baru');
		$('#modalkkbaru').modal('show');
	});

	$('.nik').mask('00000000000000000000');
	$('.money').mask('000.000.000.000.000.000');

	$('#suratTidakMampu').submit(function() {
		var form_data = new FormData($('#suratTidakMampu')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 6) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSKTM').modal('hide');
					$('#suratTidakMampu')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSKTTJS').submit(function() {
		var form_data = new FormData($('#suratSKTTJS')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSKTTJS').modal('hide');
					$('#suratSKTTJS')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratDomisili').submit(function() {
		var form_data = new FormData($('#suratDomisili')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 6) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalDomisili').modal('hide');
					$('#suratDomisili')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSKMD').submit(function() {
		var form_data = new FormData($('#suratSKMD')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSKMD').modal('hide');
					$('#suratSKMD')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSKU').submit(function() {
		var form_data = new FormData($('#suratSKU')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSKU').modal('hide');
					$('#suratSKU')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSKBI').submit(function() {
		var form_data = new FormData($('#suratSKBI')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSKBI').modal('hide');
					$('#suratSKBI')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSPP').submit(function() {
		var form_data = new FormData($('#suratSPP')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSPP').modal('hide');
					$('#suratSPP')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSKP').submit(function() {
		var form_data = new FormData($('#suratSKP')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSKP').modal('hide');
					$('#suratSKP')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratSTPHSKT').submit(function() {
		var form_data = new FormData($('#suratSTPHSKT')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalSTPHSKT').modal('hide');
					$('#suratSTPHSKT')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#surataktedankk').submit(function() {
		var form_data = new FormData($('#surataktedankk')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalaktedankk').modal('hide');
					$('#surataktedankk')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratkematiandankk').submit(function() {
		var form_data = new FormData($('#suratkematiandankk')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalkematiandankk').modal('hide');
					$('#suratkematiandankk')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratkehilangataurusak').submit(function() {
		var form_data = new FormData($('#suratkehilangataurusak')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalkehilangataurusak').modal('hide');
					$('#suratkehilangataurusak')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});

	$('#suratkkbaru').submit(function() {
		var form_data = new FormData($('#suratkkbaru')[0]);

		$.ajax({
			type: "POST",
			url: base_url + 'Pengajuan/Create_pengajuan',
			dataType: "JSON",
			cache: true,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data) {
				if (data == 5) {
					toastr["error"]("File ext harus JPG, JPEG, PNG", "File ext salah");
				} else if (data == 1) {
					$('#modalkkbaru').modal('hide');
					$('#suratkkbaru')[0].reset();
					toastr["success"]("Data berhasil diinput", "Success");

				} else if (data == 2) {
					toastr["error"]("File KTP dan File KK harus diinput", "File Kosong");
				}
			}
		});
	});
</script>
</body>

</html>
