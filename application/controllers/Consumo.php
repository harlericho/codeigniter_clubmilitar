<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consumo extends CI_Controller
{

	public function __construct()
	{
		//llamamos al modelo de los sql
		parent::__construct();
		$this->load->model('Consumo_model');
	}
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		$this->load->view('main/consumo');
	}
	public function cargar()
	{
		$data = $this->Consumo_model->get_socios_entries();
		echo json_encode($data);
	}
	public function insertar()
	{
		$data = $this->input->post();
		$arrayName = array(
			'concepto_factura' => $data['txtnombreconsumo'],
			'fec_factura' => $data['fechaconusmo'],
			'valor' => $data['txtvalorconsumo'],
			'id_socio' => $data['selecsocioa'],
		);
		if ($this->Consumo_model->get_fondo_socio_entry($data['selecsocioa']) <= $data['txtvalorconsumo']) {
			echo 0;
		} else {
			$this->Consumo_model->insert_entry($arrayName);
			$this->Consumo_model->fondo_update_socio_entry($data['selecsocioa'],$data['txtvalorconsumo']);
			echo 1;
		}


	}
}
