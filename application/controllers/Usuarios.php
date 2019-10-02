<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('usuarios_model', 'perfis_model'));
		$this->load->library('form_validation');
		$this->load->helper('funcoes_helper');
		

		//$this->output->enable_profiler(TRUE);

	}
	public function index()
	{
		//verifica_login();
	//	if(!verifica_admin())redirect('alunos');
		$usuarios = $this->usuarios_model->select_all();
		echo json_encode($usuarios);
	}


	public function login()
	{
		//	$this->output->enable_profiler(TRUE);

		$this->form_validation->set_rules('usuarioLogin', 'USUÁRIO', 'trim|required');
		$this->form_validation->set_rules('senhaLogin', 'SENHA', 'trim|required|md5');
		if ($this->form_validation->run() == false):
			if (validation_errors()):
				echo validation_errors();
			endif;
		else:
			$post = $this->input->post();
			$post['usuario'] = $post['usuarioLogin'];
			$post['senha'] = $post['senhaLogin'];
			unset($post['senhaLogin']);
			unset($post['usuarioLogin']);
			//print_r($post);
			
			if ($q = $this->usuarios_model->select_login(array('usuario' => $post['usuario']))):
				if ($this->usuarios_model->select_login($post)):

					$this->session->set_userdata('logged', true);
					$this->session->set_userdata('id_usuario', $q->id_usuario);
					$this->session->set_userdata('nome', $q->nome);
					$this->session->set_userdata('usuario', $q->usuario);
					$this->session->set_userdata('nome_perfil', $q->nome_perfil);
					
					echo 'success';
				else:
					echo 'Senha Incorreta!';
				endif;

			else:
				echo 'Usuário não Cadastrado.';
			endif;
			/**/

		endif;
		if(!$this->input->post())$this->load->view('usuarios/usuarios_login');
		
	}

	public function cadastrar()
	{
		verifica_login();
		if(!verifica_admin())redirect('alunos');
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
		$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required|is_unique[usuarios.usuario]');
		
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');		
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required');
		$this->form_validation->set_rules('email_sup', 'EMAIL SUPERVISOR', 'trim|required');

		$this->form_validation->set_rules('codcur', 'CODCUR', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('codper', 'CORPER', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');

		if ($this->form_validation->run() == false):
			if(validation_errors()):
				echo validation_errors();
			endif;
		else:
			$post = $this->input->post();
			$post['senha'] = md5($post['senha']);
			unset($post['id_usuario']);
			if($this->usuarios_model->insert($post)):
				echo 'cadastrado';
			else:
				echo "Falha ao Cadastrar o Usuário";
			endif;
			/**/
		endif;
	}

	public function editar($id = null)
	{
		verifica_login();
		if(!verifica_admin())redirect('alunos');

		if(!$usuario = $this->usuarios_model->select_id($id))redirect('usuarios');
		if(!$post = $this->input->post())echo json_encode($usuario);

		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
		//$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required|is_unique[usuarios.usuario]');
		
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required');
		$this->form_validation->set_rules('email_sup', 'EMAIL SUPERVISOR', 'trim|required');

		$this->form_validation->set_rules('codcur', 'CODCUR', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('codper', 'CORPER', 'trim|required|greater_than[0]');
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');
		
		if ($this->form_validation->run() == false):
			if(validation_errors()):
				echo validation_errors();
			endif;
		else:
			if($post['senha']):
				$post['senha'] = md5($post['senha']);
			else:
				unset($post['senha']);
			endif;
			//print_r($post);

			if($this->usuarios_model->update($usuario->id_usuario, $post)):
				echo 'editado';
			else:
				echo 'Falha ao editar o Usuário';
			endif;
			
		endif;
	}
	


	public function sair() 
	{
		//set_msg('Obrigado pela Visita :)', 'info');
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('id_usuario');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('nome_perfil');
		$this->session->unset_userdata('codcur');
		$this->session->unset_userdata('codper');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('email_sup');
		$this->session->unset_userdata('nome');




		//redirect('login');
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */