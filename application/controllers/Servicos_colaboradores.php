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
	//	$this->output->enable_profiler(TRUE);
	
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
			
			$data['msg'] =  validation_errors();
		else:
			# code...
			$post = $this->input->post();
			if($servico = $this->servicos_model->select_id($post['id_servico'])):
				$post['data'] = $servico->data;
				$post['horas_inicio'] = $servico->horas_inicio;
				$post['horas_fim'] = $servico->horas_fim;
				$post['id_motivo'] = $servico->id_motivo;
				$post['diferenca'] = diff_hours($post['horas_inicio'], $post['horas_fim']);
			
				$data['teste'] = verifica_disponibilidade($post, 'insert');
				$data['sc'] = $post;
				$data['tipo'] = 'insert';
			
								
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
		//$this->form_validation->set_rules('teste', 'teste', 'trim|required');
		
		if(!$data['servico_colaborador'] = $this->servicos_colaboradores_model->select_id($id_sc)):
			$data['msg'] = 'Não encontrado';
		elseif (!$this->form_validation->run()):
			# code...
			$data['msg'] = validation_errors()? validation_errors():false;
		else:
			# code...
			$post = $this->input->post();
			$post['diferenca'] = diff_hours($post['horas_inicio'], $post['horas_fim']);
			if($this->servicos_colaboradores_model->update($post, $id_sc)):
				$data['msg'] = 'editado';
				$data['sc'] = $this->servicos_colaboradores_model->select_id($id_sc);
			else:
				$data['msg'] = 'Falha ao editar';
			endif;
			
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
		$colaboradores = $this->servicos_colaboradores_model->select_colaboradores_by_id_servico($id_servico);
		echo json_encode($colaboradores);
	}
}

/* End of file Servicos_colaboradores.php */
/* Location: ./application/controllers/Servicos_colaboradores.php */