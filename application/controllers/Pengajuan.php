<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{


	public function Create_pengajuan()
	{
		$post = $this->input->post();
		$foto = array();
		$kategori = $post['kategori'];
		$nama = $post['nama'];
		$nik = $post['nik'];

		$config['upload_path']          = './assets/dashboard/image/uploads/';
		$config['allowed_types']        = 'jpg|jpeg|bmp|png';
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if ($kategori == "Surat Keterangan Tidak Mampu") {

			if (!empty($_FILES['ktp']['name']) && !empty($_FILES['rumah']['name'])) {

				if ($_FILES['ktp']['type'] == "image/jpeg" || $_FILES['ktp']['type'] == "image/png" || $_FILES['ktp']['type'] == "image/bmp" || $_FILES['ktp']['type'] == "image/jpg") {
					if ($_FILES['rumah']['type'] == "image/jpeg" || $_FILES['rumah']['type'] == "image/png" || $_FILES['rumah']['type'] == "image/bmp" || $_FILES['rumah']['type'] == "image/jpg") {
						if ($this->upload->do_upload('ktp')) {

							$uploadData = $this->upload->data();
							$gambarKTP = $uploadData['file_name'];
							$filterGambarKTP = str_replace(" ", "", $gambarKTP);
							array_push($foto, $filterGambarKTP);

							if ($this->upload->do_upload('rumah')) {

								$uploadData = $this->upload->data();
								$gambarrumah = $uploadData['file_name'];
								$filterGambarrumah = str_replace(" ", "", $gambarrumah);
								array_push($foto, $filterGambarrumah);

								print_r($foto);

								// $this->pengajuan->addPengajuan($nama, $nik, $kategori, $filterGambarKTP, $filterGambarrumah);
								// echo 1;
							}
						}
					} else {
						echo 6;
					}
				} else {
					echo 5;
				}
			} else {
				echo 2;
			}
		}
	}
}
