<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_colaboradores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('colaboradores_model', 'servicos_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('funcoes_helper'));
		//verifica_login();
	}

	public function index()
	{
		
	}

	public function cadastrar()
	{
		$this->form_validation->set_rules('id_servico', 'SERVICO', 'trim|required');
		$this->form_validation->set_rules('chapa', 'CHAPA', 'trim|required');

		$data = null;
		if ($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				$data['msg'] =  validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
			if($servico = $this->servicos_model->select_id($post['id_servico'])):
				
				$post['data'] = $servico->data;
				$post['horas_inicio'] = $servico->horas_inicio;
				$post['horas_fim'] = $servico->horas_fim;
				$post['id_motivo'] = $servico->id_motivo;
				/**/
				$data['msg'] = $post;
				$data['servico'] = $servico;
				
			else:
				$data['msg'] = 'Serviço não encontrado!';
			endif;
			//$data['msg'] = $post;
					/*
			if($data['id_servico'] = $this->servicos_model->insert($post)):
				$data['msg'] = 'cadastrado';
			endif;
			/**/

			
		endif;	
		echo json_encode($data);
	}

}

/* End of file Servicos_colaboradores.php */
/* Location: ./application/controllers/Servicos_colaboradores.php */