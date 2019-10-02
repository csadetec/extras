<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motivos_model extends CI_Model {

	public function select()
	{
		$this->db->order_by('segmento', 'asc');
		return $this->db->get('motivos')->result();
	}
	

}

/* End of file Motivos_model.php */
/* Location: ./application/models/Motivos_model.php */