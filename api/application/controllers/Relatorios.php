<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('relatorios_model'));
		$this->load->helper(array('funcoes_helper'));
		verifica_login();
	}
	
	public function index()
	{
		$data['colaboradores'] = $this->relatorios_model->select_distinct_colaboradores();
		$data['page'] = 'relatorios/relatorios_listar';
		$data['title'] = 'Relatórios';
		$this->load->view('index', $data, FALSE);
		//echo json_encode($data);		
	}
	
	public function listar($chapa = null)
	{
		//$this->output->enable_profiler(TRUE);
		$data['individual'] = $this->relatorios_model->select_chapa($chapa);
		$data['somado'] = $this->relatorios_model->select_chapa_sum($chapa);
		echo json_encode($data);
	}


	public function filter($inicio = '2019-01-01', $fim = '2100-01-01', $order = 'data')
	{	
		
		$colaboradores = $this->relatorios_model->filter($inicio, $fim, $order);
		$data['colaboradores'] = $colaboradores;
		echo json_encode($data);
	}
}

/* End of file Relatorios.php */
/* Location: ./application/controllers/Relatorios.php */