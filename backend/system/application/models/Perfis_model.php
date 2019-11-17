<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfis_model extends CI_Model {

	public function select(){
		return $this->db->get('perfis')->result();
	}	

}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */