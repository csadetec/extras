<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes_model extends CI_Model {

	public function select_all_alunos()
	{
		# code...
		$this->db->select('a.id_aluno, a.nome, a.matricula, a.vet_nov, a.tur_ant, a.sexo, a.id_turma, t.nome_turma, a.turno, a.media, a.codcur, a.codper');
		$this->db->from('alunos as a');
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma','left');
		$this->db->order_by('a.id_turma', 'asc');
		$this->db->order_by('a.nome', 'asc');
		return $this->db->get()->result();
	}

}

