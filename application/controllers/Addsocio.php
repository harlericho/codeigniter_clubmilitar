<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addsocio extends CI_Controller
{

	public function __construct()
	{
		//llamamos al modelo de los sql
		parent::__construct();
		$this->load->model('Addsocio_model');
	}
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->load->view('main/addsocio');
	}
	public function insertar()
	{
		$data = $this->input->post();
		if ((strtoupper($data['txttiposocio']) == "VIP") && ($data['txtfondsocio'] >= 5000000.00)) {
			echo 0;
		} else if ((strtoupper($data['txttiposocio']) == "REGULAR") && ($data['txtfondsocio'] >= 1000000.00)) {
			echo 0;
		} else if ($this->Addsocio_model->dni_rows_entry($data['txtcedsocio']) == true) {
			echo 1;
		} else if (($this->Addsocio_model->count_rows_entry() == 3) && (strtoupper($data['txttiposocio']) == "VIP")) {
			echo 2;
		} else {
			$arrayName = array(
				'tipo_socio' => strtoupper($data['txttiposocio']),
				'cedula_socio' => $data['txtcedsocio'],
				'nombres_socio' => $data['txtnomsocio'],
				'fondos_socio' => $data['txtfondsocio'],
			);
			$this->Addsocio_model->insert_entry($arrayName);
			echo 3;
		}
	}

	public function listado()
	{
		$data = $this->Addsocio_model->get_entries();
		echo json_encode($data);
	}

	public function idsocio()
	{
		$data = $this->input->post('idEditar');
		$post = $this->Addsocio_model->single_entry($data);
		$arrayName = array(
			'res' => 'suc',
			'post' => $post
		);
		echo json_encode($arrayName);
	}

	public function modificar()
	{
		$data = $this->input->post();
		$arrayName = array(
			'id_socio' => $data['id'],
			'tipo_socio' => strtoupper($data['txttiposocio']),
			'nombres_socio' => $data['txtnomsocio'],
			'fondos_socio' => $data['txtfondsocio'],
		);
		if ((strtoupper($data['txttiposocio']) == "VIP") && ($data['txtfondsocio'] >= 5000000.00)) {
			echo 0;
		} else if ((strtoupper($data['txttiposocio']) == "REGULAR") && ($data['txtfondsocio'] >= 1000000.00)) {
			echo 0;
		} else if (($this->Addsocio_model->count_rows_entry() == 3) && (strtoupper($data['txttiposocio']) == "VIP")) {
			if ($this->Addsocio_model->count_rows_entry_vip($data['id']) == 1) {
				$this->Addsocio_model->update_entry($arrayName);
				echo 2;
			} else {
				echo 1;
			}
		} else {

			$this->Addsocio_model->update_entry($arrayName);
			echo 2;
		}
	}

	public function eliminar()
	{
		$data = $this->input->post('idEliminar');
		$this->Addsocio_model->delete_entry($data);
		echo 1;
	}
}
