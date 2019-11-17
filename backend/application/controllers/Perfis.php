<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('perfis_model'));
	}
	public function index()
	{
		$data['perfis'] = $this->perfis_model->select();
		echo json_encode($data);
	}






}
