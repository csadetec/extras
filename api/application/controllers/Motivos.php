<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivos extends CI_Controller {

	public function index()
	{
		$this->load->model('motivos_model');
		$motivos = $this->motivos_model->select();
		echo json_encode($motivos);		
	}

}

/* End of file Motivos.php */
/* Location: ./application/controllers/Motivos.php */