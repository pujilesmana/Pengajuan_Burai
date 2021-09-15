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
		$('#titleModal').text('Surat Keterangan Tidak Mampu');
	});

	$('#suratLahir').click(function() {
		$('[name="kategori"]').val('Surat Lahir');
		$('#titleModal').text('Pengajuan Surat Lahir');
	});

	$('#suratKematian').click(function() {
		$('[name="kategori"]').val('Surat Kematian');
		$('#titleModal').text('Pengajuan Surat Kematian');
	});

	$('.nik').mask('00000000000000000000');

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
					$('#suratpengajuan').modal('hide');
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
