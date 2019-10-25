<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public function index()
	{	
		

	}
	
	public function buscar($page = null)
	{
		$this->load->model(array('servicos_model'));
		$this->load->helper('funcoes_helper');


		switch ($page) {
			case 'servicos':
				$data['page'] = 'servicos/servicos_listar';
				$data['servicos'] = $this->servicos_model->select();
				break;
			case 'servicos/editar/':
				$data['page'] = 'servicos/servicos_form';
				$data['title'] = 'Editar Serviço ';
				break;

			case 'relatorios':
				$data['page'] = 'relatorios/relatorios_listar';
				$data['title'] = 'Relatórios';
				break;
			default:
				redirect('page');
				break;
		}
		/*
		echo '<pre>';
		print_r($data);
		/**/
		$this->load->view('index', $data);
	}
}

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */