<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

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
		$data['servicos'] = $this->servicos_model->select();
		$data['page'] = 'servicos/servicos_listar';
		/*
		print_r($data['servicos']);
		$data['servicos'] = [];
		/**/
		$this->load->view('index', $data, false);
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
		echo json_encode($data);
		
	}

	public function editar($id_servico = null)
	{
		$this->form_validation->set_rules('id_motivo', 'MOTIVO', 'trim|required');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('horas_inicio', 'INÍCIO', 'trim|required');
		$this->form_validation->set_rules('horas_fim', 'FIM', 'trim|required');
	
		if(!$data['servico'] = $this->servicos_model->select_id($id_servico)):
			$data['msg'] = 'Serviço não Cadastrado';
		elseif($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				echo validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
			$data['msg'] = 'editado';
//			print_r($post);
			/*
			if($this->turmas_model->insert($post)):
				echo 'cadastrado';
			else:
				echo 'error';
			endif;
			/**/
		endif;
		echo json_encode($data);
	}





}
