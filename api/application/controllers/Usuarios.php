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
	public function index($id_usuario = null)
	{
		if($id_usuario){
			$data['usuario']  = $this->usuarios_model->select_id($id_usuario);
		}else{
			$data['usuarios']  = $this->usuarios_model->select();

		}
		echo json_encode($data);
	}

	public function listar($id_usuario = null)
	{	
		/*
		is_admin();
		$data  = $this->usuarios_model->select_id($id_usuario);
		echo json_encode($data);
		/**/
	}

	public function login()
	{
		$this->form_validation->set_rules('usuario', 'USUÁRIO', 'trim|required');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|md5');
		$data = null;
		if ($this->form_validation->run() == false):
			$data['msg'] =  validation_errors() == true ? validation_errors():false;
		else:
			$post = $this->input->post();
			if ($usuario = $this->usuarios_model->select_login(array('usuario' => $post['usuario']))):
				if ($this->usuarios_model->select_login($post)):
					$this->session->set_userdata('logged', true);
					$this->session->set_userdata('id_usuario', $usuario->id_usuario);
					$this->session->set_userdata('nome', $usuario->nome);
					$this->session->set_userdata('usuario', $usuario->usuario);
					$this->session->set_userdata('nome_perfil', $usuario->nome_perfil);
		
					$data['msg'] = 'success';
				else:
					$data['msg'] =  'Senha Incorreta!';
				endif;

			else:
				$data['msg'] =  'Usuário não Cadastrado.';
			endif;
			/**/

		endif;
		echo json_encode($data);
	
	}

	public function cadastrar()
	{
		is_admin(true);
		
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
		$this->form_validation->set_rules('cad_usuario', 'USUÁRIO', 'trim|required|is_unique[usuarios.usuario]');
		$this->form_validation->set_rules('cad_senha', 'SENHA', 'trim|required');		
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');
		$data = null;
		if ($this->form_validation->run() == false):
			$data['msg'] = validation_errors() ? validation_errors():false;
		else:
			$post = $this->input->post();
			$post['senha'] = md5($post['cad_senha']);
			$post['usuario'] = $post['cad_usuario'];
			unset($post['cad_senha']);
			unset($post['cad_usuario']);
			
			$usuario =  $this->usuarios_model->insert($post);
			$data['usuario'] =  $usuario  ? $this->usuarios_model->select_id($usuario) :false;

		endif;
		echo json_encode($data);
	}

	public function editar($id = null)
	{
		is_admin(true);
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
		$this->form_validation->set_rules('id_perfil', 'PERFIL', 'trim|required');
		
		$data = null;
		if(!$this->usuarios_model->select_id($id)):
			$data['msg'] = 'Usuário não cadastrado';
		elseif ($this->form_validation->run() == false):
			$data['msg'] =  validation_errors() ? validation_errors():'';
		else:
			$post = $this->input->post();
			if($post['cad_senha']):
				$post['senha'] = md5($post['cad_senha']);
			endif;
			unset($post['cad_senha']);
	
			if($this->usuarios_model->update($post, $id)):
				$data['usuario'] = $this->usuarios_model->select_id($id);
				$data['msg'] = 'editado';
			else:
				$data['msg'] = 'Falha ao Editar o Usuário';
			endif;
		endif;
		echo json_encode($data);
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