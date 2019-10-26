<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('colaboradores_model', 'servicos_model', 'servicos_colaboradores_model', 'motivos_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('funcoes_helper'));
		

		//verifica_login();

	}
	public function index($id_servico = null)
	{
		if($id_servico){
			$data['servico'] = $this->servicos_model->select_id($id_servico);
		}else{
			$data['servicos'] = $this->servicos_model->select();
		}
		echo json_encode($data);
	}


	public function cadastrar()
	{	
		$this->form_validation->set_rules('id_motivo', 'MOTIVO', 'trim|required');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('horas_inicio', 'INÍCIO', 'trim|required');
		$this->form_validation->set_rules('horas_fim', 'FIM', 'trim|required');
		$this->form_validation->set_rules('obs', 'OBS', 'trim');

		$data = null;

		if ($this->form_validation->run() == false):
			
			$data['msg'] =  validation_errors() ? validation_errors():false;
		else:
			$post = $this->input->post();

			$post['id_usuario'] = $this->session->userdata('id_usuario');
			
			$data['servico'] = $this->servicos_model->insert($post);
			$data['msg'] = $data['servico'] ? 'cadastrado':'Falha ao Cadastrar';
			/**/
		endif;			
		echo json_encode($data);
	}

	public function editar($id_servico = null)
	{
		$this->form_validation->set_rules('id_motivo', 'MOTIVO', 'trim|required');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('horas_inicio', 'INÍCIO', 'trim|required');
		$this->form_validation->set_rules('horas_fim', 'FIM', 'trim|required');
		$this->form_validation->set_rules('obs', 'OBS', 'trim');
		

		if(!$data['servico'] = $this->servicos_model->select_id($id_servico)):
			$data['msg'] = 'Serviço não Cadastrado';
			//redirect('servicos');
		elseif($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				$data['msg'] = validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
			
			$sc = $this->servicos_colaboradores_model->select_colaboradores_by_id_servico($id_servico);
		
			$disponibilidade = verifica_all_sc($sc, $post, 'update');
			//$data['teste'] = $disponibilidade;
			
			if($disponibilidade['status']):
				if($this->servicos_model->update($post, $id_servico)):
					$post['diferenca'] = diff_hours($post['horas_inicio'], $post['horas_fim']);
					$data['servico'] = $this->servicos_model->select_id($id_servico);
					unset($post['obs']);
					if($this->servicos_colaboradores_model->update_id_servico($post, $id_servico)):
						$data['msg'] = 'editado';
					endif;
				else:
					$data['msg'] =  'error';
				endif;
			else:
				$data['teste'] = 'teste';
				$data['msg'] = $disponibilidade['msg'];
			endif;
			/** */
		endif;
		echo json_encode($data);
	}

	public function duplicar($id_servico = null)
	{
	
		if(!$s = $this->servicos_model->select_id($id_servico)):
			$data['msg'] = 'Serviço não Cadastrado';
		else:
			$sc = $this->servicos_colaboradores_model->select_colaboradores_by_id_servico($id_servico);
			$insert = array(
				'id_motivo'=>$s->id_motivo, 'horas_inicio'=>$s->horas_inicio, 'horas_fim'=>$s->horas_fim, 'id_usuario'=>$this->session->userdata('id_usuario')
			);
			$s = $this->servicos_model->insert($insert);
			if($s){
				$insert = null;
				$data['servico_duplicado'] = $s;

				foreach($sc as $r){
					$insert['chapa'] = $r->chapa;
					$insert['id_servico'] = $s;
					$insert['id_motivo'] = $r->id_motivo;
					$insert['id_motivo_rh'] = $r->id_motivo;
					$insert['horas_inicio'] = $r->horas_inicio;
					$insert['horas_fim'] = $r->horas_fim;
					$insert['diferenca'] = $r->diferenca;
			

					if(!$this->servicos_colaboradores_model->insert($insert)):
						$data['msg'] = 'Erro ao duplicar Serviço e Adicionar os colaboradores';
						break;
					else:
						$data['msg'] = 'duplicado';
					endif;
				
				}
			}else{
				$data['msg'] = 'ERRO ao duplicar Serviço';
			}		
		
		endif;		
		echo json_encode($data);
	}

	public function excluir($id_servico = null)
	{
	
		if(!$this->servicos_model->select_id($id_servico)):
			$data['msg'] = 'Serviço não Cadastrado';
		else:
			if(!$this->servicos_colaboradores_model->delete_by_id_servico($id_servico)){
				$data['msg'] = 'Erro ao deletar os colaboradores do serviço';
			}elseif(!$this->servicos_model->delete($id_servico)){
				$data['msg'] = 'Erro ao deletar os colaboradores do serviço';
			}else{
				$data['msg'] = 'deletado';
			}
		
		endif;
		echo json_encode($data);
	}





}
