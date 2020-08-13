<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Principal extends CI_Controller
{


	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->load->view('principal');
	}
}
