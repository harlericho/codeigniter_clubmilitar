<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		//llamamos al modelo de los sql
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		$this->load->view('login/login');
	}

	public function ingresar()
	{
		$data = $this->input->post();
		$arrayName = array(
			'email_usu' => strtolower($data['txtemail']),
			'pass_usu' => md5($data['txtpass']),
			'logged_in' => TRUE,
		);
		if ($this->Login_model->get_entry_login($arrayName) == true) {
			$this->session->set_userdata($arrayName);
			echo 1;
		} else {
			echo 0;
		}
	}

	public function salir(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
