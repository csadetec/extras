<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {

	public function index()
	{
		$inicio = '18:47';
		$fim = '19:47';

		
		$dif =  gmdate('H:i', strtotime($fim) - strtotime($inicio));
		print_r($dif);
	

	}

}

/* End of file Testes.php */
/* Location: ./application/controllers/Testes.php */