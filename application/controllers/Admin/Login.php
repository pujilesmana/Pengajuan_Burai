<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function do_login()
	{
		$post = $this->input->post();
		$username = $post['username'];
		$password = $post['password'];

		$countUser = $this->auth->getUser($username, $password)->num_rows();
		if ($countUser > 0) {
			$data = $this->auth->getUser($username, $password)->row();
			$this->session->set_userdata('id', $data->id);
			$this->session->set_userdata('nama', $data->nama);
			$this->session->set_userdata('LOGIN', true);

			echo 1;
		} else {
			echo 2;
		}
	}

	function do_logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/Login');
	}
}
