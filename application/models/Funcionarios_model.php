<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios_model extends CI_Model {

	public function insert($dados)
	{
		$this->db->insert('funcionarios', $dados);
		return $this->db->insert_id();
	}

	public function select_chapa($dados)
	{
		$this->db->where($dados);
		return $this->db->get('funcionarios')->result();
	}
	
	public function update($dados, $chapa)
	{	
		$this->db->where('chapa', $chapa);
		return $this->db->update('funcionarios', $dados);
	}
	public function select()
	{
		# code...
		$this->db->select('f.chapa, f.nome_funcionario, f.nome_funcao');
		$this->db->from('alunos as a');
		/*
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma','left');
		$this->db->join('comportamentos as c', 'a.id_comportamento = c.id_comportamento', 'left');
		$this->db->where('a.codcur', $codcur);
		$this->db->where('a.codper', $codper);
		/**/
		$this->db->order_by('f.nome_funcionario', 'asc');
		$this->db->order_by('f.nome_funcao', 'asc');
		return $this->db->get()->result();
	}


}

