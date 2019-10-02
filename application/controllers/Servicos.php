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
		$this->load->view('index', $data, false);
	}
	/*
	public function listar($chapa = null)
	{
		$colaborador = $this->colaboradores_model->select_chapa($chapa);
		echo json_encode($colaborador);
	}
	/**/


	public function cadastrar()
	{	
		$this->form_validation->set_rules('nome_turma', 'Nome da Turma', 'trim|required|ucfirst');
		$this->form_validation->set_rules('turno', 'Turno', 'trim|required|strtoupper');
		if ($this->form_validation->run() == false):
			# code...
			if(validation_errors()):
				echo validation_errors();
			endif;
		else:
			# code...
			$post = $this->input->post();
		
			if($this->turmas_model->insert($post)):
			//	set_msg('Turma cadastrado com Sucesso', 'success');
				echo 'cadastrado';
			else:
				echo 'FALHA AO CADASTRAR';
			endif;

		endif;
		
	}

	/*
	public function editar()
	{
		$this->form_validation->set_rules('matricula', 'MATRÍCULA', 'trim|required');
		if ($this->form_validation->run() == false):
			if(validation_errors()):
				echo validation_errors();
			endif;
		else:
			$post = $this->input->post();
			//print_r($post);
			if($this->alunos_model->update($post, $post['matricula'])):
				echo 'success';
			else:
				echo 'Falha ao Atualizar os Dados do Aluno';
			endif;
		endif;
	}
	/**/
}
