<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_model extends CI_Model {
	public function select()
	{
		return $this->db->get('servicos')->result();
	}
	

}

/* End of file Servicos_model.php */
/* Location: ./application/models/Servicos_model.php */