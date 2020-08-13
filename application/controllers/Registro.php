<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registro extends CI_Controller
{


	public function __construct()
	{
		//llamamos al modelo de los sql
		parent::__construct();
		$this->load->model('Registro_model');
	}
	public function index()
	{
		$this->load->view('login/registro');
	}

	public function insertar()
	{
		$data = $this->input->post();
		$arrayName = array(
			'nombres_usu' => $data['txtnombresr'],
			'email_usu' => strtolower($data['txtemailr']),
			'pass_usu' => md5($data['txtrepassr']),
		);
		$this->Registro_model->insert_entry($arrayName);
		echo 1;
	}
}
