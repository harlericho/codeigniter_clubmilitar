<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addautorizado extends CI_Controller
{
	public function __construct()
	{
		//llamamos al modelo de los sql
		parent::__construct();
		$this->load->model('Addautorizado_model');
	}
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->load->view('main/addautorizado');
	}
	public function cargar()
	{
		$data = $this->Addautorizado_model->get_socios_entries();
		echo json_encode($data);
	}
	public function insertar()
	{
		$data = $this->input->post();
		$arrayName = array(
			'nombres_autorizada' => $data['txtsocioa'],
			'id_socio' => $data['selecsocioa'],
		);
		$this->Addautorizado_model->insert_entry($arrayName);
		echo 1;
	}
	public function listado()
	{
		$data = $this->Addautorizado_model->get_entries();
		echo json_encode($data);
	}

	public function idautorizada()
	{
		$data = $this->input->post('idEditar');
		$post = $this->Addautorizado_model->single_entry($data);
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
			'id_autorizada' => $data['id'],
			'nombres_autorizada' => $data['txtsocioa'],
			'id_socio' => $data['selecsocioa'],
		);
		$this->Addautorizado_model->update_entry($arrayName);
		echo 1;
	}
	public function eliminar()
	{
		$data = $this->input->post('idEliminar');
		$this->Addautorizado_model->delete_entry($data);
		echo 1;
	}
}
