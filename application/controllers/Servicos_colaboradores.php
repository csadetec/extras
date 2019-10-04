<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_colaboradores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('servicos_colaboradores_model','colaboradores_model', 'servicos_model'));
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
				//$data['msg'] = $post;
				$data['servico'] = $servico;

				if($this->servicos_colaboradores_model->insert($post)):
					$data['msg'] = 'cadastrado';
				endif;
			else:
				$data['msg'] = 'Serviço não encontrado!';
			endif;
			
			
		endif;	
		echo json_encode($data);
	}

	public function editar($id_sc = null)
	{
		$this->form_validation->set_rules('horas_inicio', 'INÍCIO', 'trim|required');
		$this->form_validation->set_rules('horas_fim', 'FIM', 'trim|required');

		if($data['servico_colaborador'] = $this->servicos_colaboradores_model->select_id()):
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
				//$data['msg'] = $post;
				$data['servico'] = $servico;

				if($this->servicos_colaboradores_model->insert($post)):
					$data['msg'] = 'cadastrado';
				endif;
			else:
				$data['msg'] = 'Serviço não encontrado!';
			endif;
			
			
		endif;	
		echo json_encode($data);
	}
	public function listar($id_servico = null)
	{
		$colaboradores = $this->servicos_colaboradores_model->select_colaboradores_by_id_servico($id_servico);
		echo json_encode($colaboradores);
	}
}

/* End of file Servicos_colaboradores.php */
/* Location: ./application/controllers/Servicos_colaboradores.php */