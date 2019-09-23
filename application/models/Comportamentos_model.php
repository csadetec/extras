<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comportamentos_model extends CI_Model {

	public function select()
	{
		return $this->db->get('comportamentos')->result();
	}
	

}

/* End of file Comportamentos_model.php */
/* Location: ./application/models/Comportamentos_model.php */