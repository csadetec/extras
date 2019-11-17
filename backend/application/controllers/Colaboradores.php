<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array('colaboradores_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('funcoes_helper', 'form'));
		//verifica_login();
		/** */

	}

	public function index()
	{
		echo 'colaboradores';

	}
	public function pesquisa($p = null)
	{	
		$p = urldecode($p);
		//echo $p;
		$colaboradores = $this->colaboradores_model->select_seach($p);
		echo json_encode($colaboradores);
	}



	public function listar($chapa = null)
	{
		$colaborador = $this->colaboradores_model->select_chapa($chapa);
		echo json_encode($colaborador);
	}



	public function cadastrar()
	{	
		$curso = $this->session->userdata('curso'); 

		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|strtoupper');
		$this->form_validation->set_rules('matricula', 'MATRÍCULA', 'trim|required|is_unique[alunos.matricula]');

		if ($this->form_validation->run() == false):
			if(validation_errors()):
				set_msg(validation_errors(), 'danger');
			endif;
			# code...
		else:
			# code...
			$post = $this->input->post();


			if($this->alunos_model->insert($post)):
				set_msg('Aluno(a) '.'<b>'.$post['nome_aluno'].'</b>'.' Cadastrado','success');
				//redirect('alunos/listar_turma/'.$post['id_turma']);
				redirect('alunos/listar');
			else:
				set_msg("Falha ao Cadastrar o aluno", "danger");
			endif;
			/**/
			
		endif;

		$codcur = $this->session->userdata('codcur');
		$codper = $this->session->userdata('codper');

		$data['titulo'] = 'Alunos - Cadastrar';
	
		$data['turmas'] = $this->turmas_model->select($codcur, $codper);
		
		$data['page'] = 'alunos/alunos_form';
		$this->load->view('load', $data, FALSE);
	}

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

}
