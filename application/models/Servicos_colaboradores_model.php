<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_colaboradores_model extends CI_Model {

	public function insert($dados)
	{
		$this->db->insert('servicos_colaboradores', $dados);
		return $this->db->insert_id();
	}

	public function select_colaboradores_by_id_servico($id_servico)
	{
		$this->db->select('sc.id_sc, sc.id_servico, sc.id_motivo, sc.chapa, sc.horas_inicio, sc.horas_fim,  sc.diferenca, sc.data, '
			.'c.nome_colaborador, c.cargo');
		$this->db->from('servicos_colaboradores as sc');
		$this->db->join('colaboradores as c', 'sc.chapa = c.chapa');

		$this->db->where('id_servico', $id_servico);
		return $this->db->get()->result();
	}
	
	public function select_id($id_sc)
	{
		$this->db->select('sc.id_sc, sc.id_servico, sc.chapa, sc.horas_inicio, sc.horas_fim, DATE_FORMAT(sc.data, "%d/%m/%Y") as data, '
		.'c.nome_colaborador, c.cargo, m.nome_motivo');
		$this->db->from('servicos_colaboradores as sc');
		$this->db->join('colaboradores as c', 'sc.chapa = c.chapa');
		$this->db->join('motivos as m', 'sc.id_motivo = m.id_motivo');
		$this->db->where('sc.id_sc', $id_sc);

		return $this->db->get()->row();
	}

	public function update_id_servico($dados, $id_servico)
	{
		$this->db->where('id_servico', $id_servico);
		return $this->db->update('servicos_colaboradores', $dados);
	}

}

/* End of file Servicos_colaboradores_model.php */
/* Location: ./application/models/Servicos_colaboradores_model.php */