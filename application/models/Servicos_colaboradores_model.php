<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_colaboradores_model extends CI_Model {

	public function insert($dados)
	{
		$this->db->insert('servicos_colaboradores', $object);
		return $this->db->insert_id();
	}
	

}

/* End of file Servicos_colaboradores_model.php */
/* Location: ./application/models/Servicos_colaboradores_model.php */