<!--================Home Banner Area =================-->
<section class="home_banner_area">
	<div class="overlay"></div>
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content row">
				<div class="offset-lg-1 col-lg-10">
					<h3>Pengajuan Pembuatan Surat
						<br />Desa Burai
					</h3>
					<p>Website mempermudah warga untuk mengajukan / membuat surat</p>
					<a class="white_bg_btn page-scroll" href="#Pengajuan">Lihat Pengajuan</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Hot Deals Area =================-->
<section class="hot_deals_area section_gap" id="Pengajuan">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6" style="margin-bottom: 13px;" id="SKTM">
				<div class="hot_deal_box" style="border-radius: 20px; box-shadow: 10px 10px 5px grey;">
					<img class="img-fluid" src="<?= base_url() ?>assets/dashboard/img/product/hot_deals/deal1.jpg" alt="" style="border-radius: 20px;">
					<div class="content" style="width:100%;">
						<h2>Surat Keterangan Tidak Mampu(SKTM)</h2>
					</div>
					<a class="hot_deal_link" href="javascript:void(0)" data-toggle="modal" data-target="#modalSKTM"></a>
				</div>
			</div>

			<div class="col-lg-6" style="margin-bottom: 13px;" id="suratLahir">
				<div class="hot_deal_box" style="border-radius: 20px; box-shadow: 10px 10px 5px grey;">
					<img class="img-fluid" src="<?= base_url() ?>assets/dashboard/img/product/hot_deals/deal1.jpg" alt="" style="border-radius: 20px;">
					<div class="content" style="width:100%;">
						<h2>Pengajuan Surat Lahir</h2>
					</div>
					<a class="hot_deal_link" href="javascript:void(0)" data-toggle="modal" data-target="#suratpengajuan"></a>
				</div>
			</div>

			<div class="col-lg-6" style="margin-bottom: 13px;" id="suratKematian">
				<div class="hot_deal_box" style="border-radius: 20px; box-shadow: 10px 10px 5px grey;">
					<img class="img-fluid" src="<?= base_url() ?>assets/dashboard/img/product/hot_deals/deal1.jpg" alt="" style="border-radius: 20px;">
					<div class="content" style="width:100%;">
						<h2>Pengajuan Surat Kematian</h2>
					</div>
					<a class="hot_deal_link" href="javascript:void(0)" data-toggle="modal" data-target="#suratpengajuan"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Hot Deals Area =================-->

<!-- Modal -->
<div class="modal fade" id="modalSKTM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titleModal">Surat Keterangan Tidak Mampu(SKTM)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="javascript:void(0)" method="post" id="suratTidakMampu" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input type="hidden" name="kategori">
						<input class="form-control" type="text" name="nama" value="" placeholder="Masukkan Nama Lengkap Sesuai KTP" required>
					</div>
					<div class="form-group">
						<label for="">NIK sesuai KTP</label>
						<input class="form-control nik" type="text" name="nik" value="" placeholder="Masukkan NIK Sesuai KTP" required>
					</div>
					<div class="form-group">
						<label for="">Upload KTP</label>
						<input class="form-control" type="file" name="ktp" id="ktp" required>
					</div>
					<div class="form-group">
						<label for="">Upload Foto Rumah</label>
						<input class="form-control" type="file" name="rumah" id="rumah" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup Form</button>
					<button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
				</div>
			</form>
		</div>
	</div>
</div>
