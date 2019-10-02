<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Colaboradores_model extends CI_Model {


	public function insert($dados)
	{
		$this->db->insert('colaboradores', $dados);
		return $this->db->insert_id();
	}

	public function select_chapa($chapa)
	{
		$this->db->where('chapa', $chapa);
		return $this->db->get('colaboradores')->row();
	}
	
	public function update($dados, $chapa)
	{	
		$this->db->where('chapa', $chapa);
		return $this->db->update('colaboradores', $dados);
	}

	public function select_seach($c)
	{
		# code...
		$this->db->select('c.chapa, c.nome_colaborador, c.cargo');
		$this->db->from('colaboradores as c');
		$this->db->like('c.nome_colaborador', $c, 'BOTH');
		$this->db->order_by('c.cargo', 'asc');
		$this->db->order_by('c.nome_colaborador', 'asc');
		return $this->db->get()->result();
	}

	public function select()
	{
		# code...
		$this->db->select('c.chapa, c.nome_colaborador, c.cargo');
		$this->db->from('colaboradores as c');
		/*
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma','left');
		$this->db->join('comportamentos as c', 'a.id_comportamento = c.id_comportamento', 'left');
		$this->db->where('a.codcur', $codcur);
		$this->db->where('a.codper', $codper);
		/**/
		$this->db->order_by('c.cargo', 'asc');
		$this->db->order_by('c.nome_colaborador', 'asc');
		return $this->db->get()->result();
	}


}

