<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
	public function index()
	{
		$x['sidebar'] = "download";
		$x['pengajuan'] =  $this->pengajuan->getPengajuanDownload()->result_array();
		$this->load->view('header', $x);
		$this->load->view('download');
		$this->load->view('footer');
	}
}
