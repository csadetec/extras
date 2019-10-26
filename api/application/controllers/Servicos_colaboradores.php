<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_colaboradores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('servicos_colaboradores_model','colaboradores_model', 'servicos_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('funcoes_helper'));
		verifica_login();
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
			
			$data['msg'] =  validation_errors() or false;
		else:
			# code...
			$post = $this->input->post();
			if($servico = $this->servicos_model->select_id($post['id_servico'])):
				$post['data'] = $servico->data;
				$post['horas_inicio'] = $servico->horas_inicio;
				$post['horas_fim'] = $servico->horas_fim;
				$post['id_motivo'] = $servico->id_motivo;
				$post['id_motivo_rh'] = $servico->id_motivo;
				$post['diferenca'] = diff_hours($post['horas_inicio'], $post['horas_fim']);

				$data['post'] = $post;
				
				$disponivel = verifica_disponibilidade($post, 'insert');
				if($disponivel['status']):
					$sc = $this->servicos_colaboradores_model->insert($post);
					$data['msg'] = $sc ? 'cadastrado':'Falha ao Cadastrar';
				else:
					$data['msg'] = $disponivel['msg'];
				endif;
				/**/
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
		$this->form_validation->set_rules('id_motivo', 'MOTIVO', 'trim|required');
		
		if(!$data['sc'] = $this->servicos_colaboradores_model->select_id($id_sc)):
			$data['msg'] = 'Não encontrado';
		elseif (!$this->form_validation->run()):
			# code...
			$data['msg'] = validation_errors()? validation_errors():false;
		else:
			$post = $this->input->post();
			
			$post['diferenca'] = diff_hours($post['horas_inicio'], $post['horas_fim']);
			$post['data'] = $data['sc']->data;
			$post['chapa'] = $data['sc']->chapa;
			$post['id_servico'] = $data['sc']->id_servico;
			//	$data['post'] = $post;
			
			$disponivel = verifica_disponibilidade($post, 'update');
			//$data['teste'] = $disponivel;
			
			if($disponivel['status']):
				if($this->servicos_colaboradores_model->update($post, $id_sc)):
					$data['sc'] = $this->servicos_colaboradores_model->select_id($id_sc);
					$data['msg'] = 'editado';
				else:
					$data['msg'] = 'Falha ao Editar';
				endif;
			else:
				$data['msg'] = $disponivel['msg'];
			endif;
			/** */
		endif;	
		echo json_encode($data);
	}

	public function excluir($id_sc = null)
	{
		$data = null;
		if(!$this->servicos_colaboradores_model->select_id($id_sc)):
			$data['msg'] = 'Colaborador não encontrado';

		elseif($this->servicos_colaboradores_model->delete($id_sc)):
			$data['msg'] = 'deletado';
		endif;

		echo json_encode($data);
	}

	

	public function listar($id_servico = null)
	{
		$data['sc'] = $this->servicos_colaboradores_model->select_colaboradores_by_id_servico($id_servico);
		echo json_encode($data);
	}
}

/* End of file Servicos_colaboradores.php */
/* Location: ./application/controllers/Servicos_colaboradores.php */