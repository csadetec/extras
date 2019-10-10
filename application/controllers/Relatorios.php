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
	public function teste()
	{
		$data['colaboradores'] = $this->relatorios_model->select_distinct_colaboradores();
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}

}

/* End of file Relatorios.php */
/* Location: ./application/controllers/Relatorios.php */