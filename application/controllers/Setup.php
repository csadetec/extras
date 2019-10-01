<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function index()
	{
		$data['usuario'] = $_SESSION;

		if($_SESSION['logged']){
			$data['navbar']  = 'show';

		}else{
			$data['navbar']  = 'd-none';
		}


		echo json_encode($data);
	}

}

/* End of file Setup.php */
/* Location: ./application/controllers/Setup.php */