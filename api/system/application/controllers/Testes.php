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


	public function restart()
	{
		$this->load->model('testes_model');
		$this->testes_model->restart();
		redirect('');

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

	public function intervalo($inicio= '15:00', $fim='17:00',$inicio_new = '20:00', $fim_new='10:00')

	{	
		echo '<pre>';
		echo 'Inicio '.$inicio;
		echo '<br>';
		echo 'Fim: '.$fim;
		echo '<br>';
		echo 'Inicio novo: '.$inicio_new;
		echo '<br>';
		echo 'Fim novo: '.$fim_new;
		echo '<br>';
		
		$inicio = strtotime($inicio);
		$fim = strtotime($fim);

		$inicio_new = strtotime($inicio_new);
		$fim_new = strtotime($fim_new);

		$total = $inicio + $fim;
		echo '<br>'.'Total:      '.$total;

		$total_new = $inicio_new + $fim_new;
		echo '<br>'.'Total Novo: '.$total_new;

		echo '<br>';
		echo '<br>';
		if($inicio < $inicio_new and $inicio_new < $fim){
			echo 'Esta no Intervalo';
		}elseif($inicio < $fim_new and $fim_new < $fim){
			echo 'Esta no Intervalo';
		}elseif($inicio_new < $inicio and $inicio < $fim_new){
			echo 'Esta no Intervalo';
		}elseif($inicio_new < $fim  and $fim < $fim_new){
			echo 'Esta no Invervalo';
		}else{
			echo 'Nao esta no intervalo';
		
		}
		


	}

	
}

/* End of file Testes.php */
/* Location: ./application/controllers/Testes.php */