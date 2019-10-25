<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T extends CI_Controller {

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
		echo 'testes';
	}






}
