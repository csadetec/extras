<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {

	public function index()
	{
		$inicio = '07:00';
		$fim = '11:30';

		
		$dif =  gmdate('H:i', strtotime($fim) - strtotime($inicio));
		echo $dif."\n";

		list($h, $m) = explode(':', $dif);

		$minutos_total = $h*60+$m;
		echo $minutos_total."\n";
	

	}

	public function soma($h1 = '120', $h2='120')
	{
	
		//$m = 
		$t = $h1 + $h2;
		echo "minutos total ".$t."\n";

		$horas = floor($t/60);
		$minutos = $t%60;

		$horas = $horas <= 9 ? '0'.$horas:$horas;
		$minutos = $minutos <= 9 ? '0'.$minutos:$minutos;


		echo "Horas ".$horas.':'.$minutos;


	

	

	


		//echo $h1+$h2;
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