<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('usuarios_model', 'perfis_model'));
		$this->load->library('form_validation');
		$this->load->helper('funcoes_helper');
		echo false;
		

		//$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		is_admin(true);
		$data['usuarios'] = $this->usuarios_model->select();
		$data['page'] = 'usuarios/usuarios_listar';
		$data['title'] = 'Usuários';
		$data['perfis'] = $this->perfis_model->select();
		$this->load->view('index', $data, FALSE);
	}

	public function listar($id_usuario = null)
	{
		is_admin();
		$data  = $this->usuarios_model->select_id($id_usuario);
		echo json_encode($data);
	}

	public function login()
	{
		//	$this->output->enable_profiler(TRUE);

		$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|md5');
		if ($this->form_validation->run() == false):
			echo validation_errors() == true ? validation_errors():false;
		else:
			$post = $this->input->post();
			if ($usuario = $this->usuarios_model->select_login(array('usuario' => $post['usuario']))):
				if ($this->usuarios_model->select_login($post)):

					$this->session->set_userdata('logged', true);
					$this->session->set_userdata('id_usuario', $usuario->id_usuario);
					$this->session->set_userdata('nome', $usuario->nome);
					$this->session->set_userdata('usuario', $usuario->usuario);
					$this->session->set_userdata('nome_perfil', $usuario->nome_perfil);
		
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
		is_admin(true);
		
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
		$this->form_validation->set_rules('cad_usuario', 'USUÁRIO', 'trim|required|is_unique[usuarios.usuario]');
		$this->form_validation->set_rules('cad_senha', 'SENHA', 'trim|required');		
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');

		if ($this->form_validation->run() == false):
			echo validation_errors() == true ? validation_errors():false;
		else:
			$post = $this->input->post();
			$post['senha'] = md5($post['cad_senha']);

			unset($post['cad_senha']);
			unset($post['cad_usuario']);
			print_r($post);
//			echo $this->usuarios_model->insert($post) == true ? 'cadastrado':false;

		endif;
	}

	public function editar($id = null)
	{
		is_admin(true);

		if(!$usuario = $this->usuarios_model->select_id($id))redirect('usuarios');
		if(!$post = $this->input->post())echo json_encode($usuario);

		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
		//$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required|is_unique[usuarios.usuario]');
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');
		
		if ($this->form_validation->run() == false):
			echo validation_errors() == true ? validation_errors():'';
			/*
			if(validation_errors()):
				echo validation_errors();
			endif;
			/**/
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
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('nome_perfil');
		
		redirect('');
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */