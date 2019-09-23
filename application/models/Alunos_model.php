<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos_model extends CI_Model {

	public function truncate()
	{
		return $this->db->truncate('alunos');
	}

	public function set_turma_zero($codcur, $codper, $id_turma)
	{
		$this->db->set('id_turma', 0);
		$this->db->where('id_turma', $id_turma);
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);
		return $this->db->update('alunos');	
	}

	public function set_turma_zero_all($codcur, $codper)
	{
		$this->db->set('id_turma', 0);
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);
		return $this->db->update('alunos');	
	}

	public function insert($dados)
	{
		$this->db->insert('alunos', $dados);
		return $this->db->insert_id();
	}

	public function select_where($dados)
	{
		$this->db->where($dados);
		return $this->db->get('alunos')->result();
	}

	public function select_turno($codcur, $codper)
	{
		$this->db->select('count(*) as todos, '
			.'(select count(*) from alunos where turno="MANHÃ" AND codcur="'.$codcur.'" and codper="'.$codper.'") as manha,'
			.'(select count(*) from alunos where turno="TARDE" AND codcur="'.$codcur.'" and codper="'.$codper.'") as tarde'

			);
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);

		return $this->db->get('alunos')->row();
	}

	public function select_sem_turma()
	{
		# code...
		$this->db->select('count(*) as sem_turma');
		$this->db->where('id_turma', 0);

		return $this->db->get('alunos');
	}

	public function update($dados, $ra)
	{	
		$this->db->where('matricula', $ra);
		return $this->db->update('alunos', $dados);
	}

	public function select_ra($ra)
	{
		# code...
		$this->db->select('a.id_aluno, a.nome, a.matricula, a.vet_nov, a.tur_ant, a.sexo, a.id_turma, a.cidade, a.turno, t.nome_turma, a.media, a.nee, a.id_comportamento');
		$this->db->from('alunos as a');
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma','left');
		$this->db->where('a.matricula', $ra);
		return $this->db->get()->row();
	}

	public function select($codcur, $codper)
	{
		# code...
		$this->db->select('a.id_aluno, a.nome, a.matricula, a.vet_nov, a.tur_ant, a.sexo, a.id_turma, t.nome_turma, a.turno, a.media, a.codcur, a.codper, a.nee, a.escola_origem, c.nome_comportamento');
		$this->db->from('alunos as a');
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma','left');
		$this->db->join('comportamentos as c', 'a.id_comportamento = c.id_comportamento', 'left');
		$this->db->where('a.codcur', $codcur);
		$this->db->where('a.codper', $codper);
		$this->db->order_by('a.id_turma', 'asc');
		$this->db->order_by('a.nome', 'asc');
		

		return $this->db->get()->result();
	}
	public function select_turma($turma)
	{
		# code...
		$this->db->select('a.id_aluno, a.nome, a.matricula, a.vet_nov, a.tur_ant, a.sexo, a.id_turma, a.cidade, a.turno,  t.nome_turma, a.media, a.nee, a.escola_origem, c.nome_comportamento');
		$this->db->from('alunos as a');
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma');
		$this->db->join('comportamentos as c', 'a.id_comportamento = c.id_comportamento', 'left');
		$this->db->where('a.id_turma', $turma);
		$this->db->order_by('a.nome', 'asc');
		return $this->db->get()->result();
	}

	public function select_por_sexo($sexo, $tur_ant)
	{
		$this->db->where('sexo', $sexo);
		$this->db->like('tur_ant', $tur_ant, 'after');
		return $this->db->get('alunos')->result();
	}

	
	public function select_cont_sexo()
	{
		$this->db->select('count(sexo) as todos,'
			.' (select count(sexo) from alunos where sexo = "m") as masculino,'
			.' (select count(sexo) from alunos where sexo = "f") as feminino'
			
			.'');
		return $this->db->get('alunos')->row();
	}

	public function select_media($dados, $start, $end)
	{
		$this->db->where($dados);
		$this->db->where('media >=', $start);
		$this->db->where('media <=', $end);
		return $this->db->get('alunos')->result();
	}

	public function select_all()
	{
		$this->db->order_by('nome', 'asc');
		return $this->db->get('alunos')->result();
	}

	public function select_count_turma($id_turma=null)
	{
		$this->db->select('count(*)');
		$this->db->where('id_turma', $id_turma);
		return $this->db->get('alunos')->row();
	}

}

