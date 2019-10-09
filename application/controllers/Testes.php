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

	public function intervalo($h = '20:00')

	{	

		echo '18:00';
		echo '<br>';
		echo '19:00';
		echo '<br>';

		$inicio = strtotime('18:00');
		$fim = strtotime('19:00');

		
		$agora = strtotime($h);

		if($inicio <= $agora and $agora <= $fim){
			echo 'Esta no Intervalo';
		}else{
			echo 'Esta fora';
		}



	}

}

/* End of file Testes.php */
/* Location: ./application/controllers/Testes.php */