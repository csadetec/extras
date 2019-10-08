<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {

	public function index()
	{
		$inicio = '18:30';
		$fim = '20:00';

		$inicio = strtotime($inicio);
		$fim = strtotime($fim);

		$dif =  $fim - $inicio - 3600;
		print_r($dif);
		echo '<br>';
		print_r(date('H:i', $dif));

	}

}

/* End of file Testes.php */
/* Location: ./application/controllers/Testes.php */