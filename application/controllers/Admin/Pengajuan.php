<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('LOGIN') == true) {
			$x['data'] = $this->pengajuan->getPengajuan()->result_array();
			$this->load->view('admin/pengajuan', $x);
		} else {
			redirect('Admin/Login');
		}
	}

	public function upStatus()
	{
		$post = $this->input->post();
		$status = $post['status'];

		if ($status == "1") {
			$id = $post['idP'];

			$config['upload_path']          = './assets/admin/uploads/';
			$config['allowed_types']        = 'docx|pdf|doc';
			$config['max_size']             = 0;

			$this->load->library('upload', $config);

			if (!empty($_FILES['surat']['name'])) {
				if ($this->upload->do_upload('surat')) {

					$uploadData = $this->upload->data();
					$fileSurat = $uploadData['file_name'];
					$filterfileSurat = str_replace(" ", "", $fileSurat);

					$this->pengajuan->updatePublishPengajuan($status, $id, $filterfileSurat);
					echo 1;
				}
			} else {
				echo 3;
			}
		} elseif ($status == "2") {
			$id = $post['idT'];
			$catatan = $post['catatan'];

			$this->pengajuan->updateTolakPengajuan($status, $id, $catatan);
			echo 2;
		}
	}
}
