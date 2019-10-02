<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function index()
	{


	}


	public function data()
	{
		date_default_timezone_set('America/Sao_Paulo');
		$data['dia'] = date('Y-m-d');
		$data['inicio'] = date('H:i');

		$fim =  strtotime($data['inicio']) + 60*60;

		$data['fim'] = date('H:i', $fim);

		echo json_encode($data);
	}
}

/* End of file Setup.php */
/* Location: ./application/controllers/Setup.php */