<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('colaboradores_model', 'servicos_model', 'servicos_colaboradores_model', 'motivos_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('funcoes_helper'));
		

		verifica_login();

	}
	public function index()
	{
		$data['servicos'] = $this->servicos_model->select();
		$data['page'] = 'servicos/servicos_listar';
		$this->load->view('index', $data, false);
	}

	public function listar($id_servico = null)
	{
		$servico = $this->servicos_model->select_id($id_servico);
		$data['servico'] = $servico;
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
			//$data['msg'] = $post;
			$data['servico'] = $this->servicos_model->insert($post);
			$data['msg'] = $data['servico'] ? 'cadastrado':'Falha ao Cadastrar';
			/**/
		endif;			
		if($this->input->post()):
			echo json_encode($data);
		else:
			$data['title'] = 'Cadastrar Serviço';
			$data['page'] = 'servicos/servicos_form';
			$data['motivos'] = $this->motivos_model->select();
			$this->load->view('index', $data, FALSE);
		endif;
	}

	public function editar($id_servico = null)
	{
		$this->form_validation->set_rules('id_motivo', 'MOTIVO', 'trim|required');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('horas_inicio', 'INÍCIO', 'trim|required');
		$this->form_validation->set_rules('horas_fim', 'FIM', 'trim|required');
		$this->form_validation->set_rules('obs', 'OBS', 'trim');
		

		if(!$data['servico'] = $this->servicos_model->select_id($id_servico)):
			//$data['msg'] = 'Serviço não Cadastrado';
			redirect('servicos');
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

		if($this->input->post()):
			echo json_encode($data);
		else:
			$data['title'] = 'Editar Serviço Nº '.$id_servico;
			$data['page'] = 'servicos/servicos_form';
			$data['motivos'] = $this->motivos_model->select();

			$this->load->view('index', $data, FALSE);
		endif;
	}

	public function duplicar($id_servico = null)
	{
	
		if(!$s = $this->servicos_model->select_id($id_servico)):
			//$data['msg'] = 'Serviço não Cadastrado';
			redirect('servicos');
		else:
			$sc = $this->servicos_colaboradores_model->select_colaboradores_by_id_servico($id_servico);
			$insert = array(
				'id_motivo'=>$s->id_motivo, 'horas_inicio'=>$s->horas_inicio, 'horas_fim'=>$s->horas_fim
			);
			$s = $this->servicos_model->insert($insert);
			if($s){
				$insert = null;
				foreach($sc as $r){
					$insert['chapa'] = $r->chapa;
					$insert['id_servico'] = $s;
					$insert['id_motivo'] = $r->id_motivo;
					$insert['horas_inicio'] = $r->horas_inicio;
					$insert['horas_fim'] = $r->horas_fim;
					$insert['diferenca'] = $r->diferenca;

					if(!$this->servicos_colaboradores_model->insert($insert)){
						$msg = 'Erro ao duplicar Serviço';
						echo '<script>alert("'.$msg.'")</script>';
						$url = 'http://'.$_SERVER['SERVER_NAME'].'/extras/servicos';
						echo '<script>location.href = "'.$url.'"</script>';
					}

				}
				redirect('servicos/editar/'.$s);
			}else{
				$msg = 'Erro ao duplicar Serviço';
				echo '<script>alert("'.$msg.'")</script>';
				$url = 'http://'.$_SERVER['SERVER_NAME'].'/extras/servicos';
				echo '<script>location.href = "'.$url.'"</script>';
							
			}		
		
		endif;

		
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
