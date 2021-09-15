<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$x['sidebar'] = "pengajuan";
		$this->load->view('header', $x);
		$this->load->view('home');
		$this->load->view('footer');
	}
}
