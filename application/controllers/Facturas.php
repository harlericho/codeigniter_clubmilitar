<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facturas extends CI_Controller
{

	public function __construct()
	{
		//llamamos al modelo de los sql
		parent::__construct();
		$this->load->model('Facturas_model');
	}
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->load->view('main/facturas');
	}
	public function listado()
	{
		$data = $this->Facturas_model->get_entries();
		echo json_encode($data);
	}
	public function eliminar(){
		$data = $this->input->post('idEliminar');
		$this->Facturas_model->delete_entry($data);
		echo 1;
	}

}
