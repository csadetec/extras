<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_model extends CI_Model {
	public function select()
	{
		$this->db->select('s.id_servico, DATE_FORMAT(s.data, "%d/%m/%Y") as data, s.horas_inicio, s.horas_fim, '
			.'m.nome_motivo, '
			.'u.nome'
		);
		$this->db->from('servicos as s');
		$this->db->join('motivos as m', 'm.id_motivo = s.id_motivo');
		$this->db->join('usuarios as u', 's.id_usuario = u.id_usuario');

		return $this->db->get()->result();
	}

	public function select_id($id_servico)
	{
		$this->db->select('s.id_servico, s.id_motivo, s.data, date_format(s.data, "%d/%m/%Y") as data_editada, s.horas_inicio, s.horas_fim, s.obs, '
			.'m.nome_motivo'
		);
		$this->db->from('servicos as s');
		$this->db->join('motivos as m', 'm.id_motivo = s.id_motivo');
		
		$this->db->where('id_servico', $id_servico);
		return $this->db->get()->row();
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
	
	public function delete($id_servico)
	{
		$this->db->where('id_servico', $id_servico);
		return $this->db->delete('servicos');
		
	}



}

/* End of file Servicos_model.php */
/* Location: ./application/models/Servicos_model.php */