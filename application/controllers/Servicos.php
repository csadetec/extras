<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('colaboradores_model', 'servicos_model', 'servicos_colaboradores_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('funcoes_helper'));
		

		//verifica_login();

	}
	public function index()
	{
		$data['servicos'] = $this->servicos_model->select();
		$data['page'] = 'servicos/servicos_listar';
		/*
		print_r($data['servicos']);
		$data['servicos'] = [];
		/**/
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
		$data = null;
		if ($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				$data['msg'] =  validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
					
			if($data['id_servico'] = $this->servicos_model->insert($post)):
				$data['msg'] = 'cadastrado';
			endif;

			
		endif;			
		if($this->input->post()):
			echo json_encode($data);
		else:
			$data['title'] = 'Cadastrar Serviço';
			$data['page'] = 'servicos/servicos_form';
			$this->load->view('index', $data, FALSE);
		endif;
	}

	public function editar($id_servico = null)
	{
		$this->form_validation->set_rules('id_motivo', 'MOTIVO', 'trim|required');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('horas_inicio', 'INÍCIO', 'trim|required');
		$this->form_validation->set_rules('horas_fim', 'FIM', 'trim|required');
	
		if(!$this->servicos_model->select_id($id_servico)):
			$data['msg'] = 'Serviço não Cadastrado';
		elseif($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				$data['msg'] = validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
			
			if($this->servicos_model->update($post, $id_servico)):
				$post['diferenca'] = diff_date($post['horas_inicio'], $post['horas_fim']);
				if($this->servicos_colaboradores_model->update_id_servico($post, $id_servico)):
					$data['msg'] = 'editado';
				endif;
			else:
				$data['msg'] =  'error';
			endif;
			/**/
		endif;

		if($this->input->post()):
			echo json_encode($data);
		else:
			$data['title'] = 'Editar Serviço Nº '.$id_servico;
			$data['page'] = 'servicos/servicos_form';
			$this->load->view('index', $data, FALSE);
		endif;
	}





}
