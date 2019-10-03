<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_model extends CI_Model {
	public function select()
	{
		return $this->db->get('servicos')->result();
	}

	public function select_id($id_servico)
	{
		$this->db->where('id_servico', $id_servico);
		return $this->db->get('servicos')->row();
	}

	public function insert($dados)
	{
		$this->db->insert('servicos', $dados);
		return $this->db->insert_id();
	}
	public function update($dados, $id_servico)
	{
		$this->db->where('id_servico', $id_servico);
		return $this->db->update('servicos', $dados);
	}
	

}

/* End of file Servicos_model.php */
/* Location: ./application/models/Servicos_model.php */