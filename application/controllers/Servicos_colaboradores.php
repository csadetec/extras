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
	//	$this->output->enable_profiler(TRUE);
	
	}

	public function index()
	{
		
	}

	public function cadastrar()
	{
		$this->form_validation->set_rules('id_servico', 'SERVICO', 'trim|required');
		$this->form_validation->set_rules('chapa', 'CHAPA', 'trim|required');
		$data['msg'] = null;
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
				$post['diferenca'] = diff_date($post['horas_inicio'], $post['horas_fim']);
				//$data['msg'] = $post;
				$where = array(
					'chapa' => $post['chapa'],
					'data'  => $post['data']
				);
				
				$data['post'] = $post;
				if($sc = $this->servicos_colaboradores_model->select_where($where)):
					
					if(!$sc = verifica_disponibilidade($sc, $post['horas_inicio'], $post['horas_fim'])):
						if($this->servicos_colaboradores_model->insert($post)):
							$data['msg'] = 'cadastrado';
							$data['msg_teste'] = 'cadastrado por nao estar batendo às horas';
						endif;
					else:
					
						$data['msg'] = "Colaborador Já esta agendado neste horário\nNo serviço N° ".$sc->id_servico;
					endif;
					/**/
				else:
					if($this->servicos_colaboradores_model->insert($post)):
						$data['msg'] = 'cadastrado';
						$data['msg_teste'] = 'cadastrado por nao esta na data';
					endif;
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


		if(!$data['servico_colaborador'] = $this->servicos_colaboradores_model->select_id($id_sc)):
			$data['msg'] = 'Não encontrado';
		elseif ($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				$data['msg'] =  validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
			$post['diferenca'] = diff_date($post['horas_inicio'], $post['horas_fim']);
			
			if($servico = $this->servicos_colaboradores_model->update($post, $id_sc)):
				$data['msg'] = 'Editado com Sucesso!';
			endif;
			/**/
			
		endif;	
		echo json_encode($data);
	}

	public function excluir($id_sc = null)
	{
		$data = null;
		if(!$this->servicos_colaboradores_model->select_id($id_sc)):
			$data['msg'] = 'Colaborador não encontrado';

		elseif($this->servicos_colaboradores_model->delete($id_sc)):
			$data['msg'] = 'Deletado com Sucesso!';
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