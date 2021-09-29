<section class="cart_area">
	<div class="container">
		<table id="download" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pengaju</th>
					<th>Kategori Surat</th>
					<th>Unduh</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 0;
				foreach ($pengajuan as $i) :
					$id = $i['pengajuan_id'];
					$pengajuan_nama = $i['pengajuan_nama'];
					$pengajuan_nik = $i['pengajuan_nik'];
					$pengajuan_tanggal = $i['tanggal'];
					$pengajuan_kategori = $i['pengajuan_kategori'];
					$pengajuan_status = $i['pengajuan_status'];
					$pengajuan_surat = $i['pengajuan_surat'];
					$pengajuan_catatan = $i['pengajuan_catatan'];

					$no++;
				?>
					<tr>
						<td width="5"><?= $no ?></td>
						<td><?= $pengajuan_nama ?></td>
						<td><?= $pengajuan_kategori ?></td>
						<?php if ($pengajuan_status == 1) : ?>
							<td class="text-center">
								<a href="<?= base_url() ?>assets/admin/uploads/<?= $pengajuan_surat; ?>" target="_blank"><i class="fa fa-download"></i></a>
							</td>
						<?php elseif ($pengajuan_status == 2) : ?>
							<td class="text-center">
								<i class="fa fa-download" data-toggle="tooltip" data-placement="top" title="<?= $pengajuan_catatan; ?>"></i>
							</td>
						<?php endif; ?>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
