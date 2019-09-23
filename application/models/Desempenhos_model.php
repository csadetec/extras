<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desempenhos_model extends CI_Model {

	public function select($value='')
	{
		# code...
		return $this->db->get('desempenhos')->result();
	}
	

}

/* End of file Desempenhos_model.php */
/* Location: ./application/models/Desempenhos_model.php */