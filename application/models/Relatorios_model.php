<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios_model extends CI_Model {

	public function select_total($codcur, $codper)
	{	
		$this->db->select('a.id_turma, t.nome_turma, count(*) as qtd');
		$this->db->from('alunos as a');
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma');
		$this->db->where('a.codcur', $codcur);
		$this->db->where('a.codper', $codper);
		$this->db->group_by('a.id_turma');
		return $this->db->get()->result();
	}


	public function select_where($codcur, $codper, $where=null)
	{	
		$this->db->select('a.id_turma, t.nome_turma, count(*) as qtd');
		$this->db->from('alunos as a');
		$this->db->join('turmas as t', 'a.id_turma = t.id_turma');
		$this->db->where('a.codcur', $codcur);
		$this->db->where('a.codper', $codper);
		if($where)$this->db->where($where);
		
		$this->db->group_by('a.id_turma');
		return $this->db->get()->result();
	}

	public function select($turma=null, $codcur=null, $codper=null)
	{
		if($turma){
			$this->db->select(''
				.'count(*) as total_alunos,'
				.'(select count(*) from alunos where vet_nov="vet" and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as veteranos,'
				.'(select count(*) from alunos where vet_nov="nov" and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as novatos,'
				.'(select count(*) from alunos where sexo="m" and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as masculino,'
				.'(select count(*) from alunos where sexo="f" and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as feminino,'
				.'(select count(*) from alunos where id_turma=0 and codcur="'.$codcur.'" and codper="'.$codper.'") as sem_turma,'
				.'(select count(*) from alunos where media <= 70 and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as media_70,'
				.'(select count(*) from alunos where (media > 70 and media <=80) and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as media_80,'
				.'(select count(*) from alunos where media > 80 and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as media_100, '
				.'(select count(*) from alunos where nee = 1  and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as nee,'
				.'(select count(*) from alunos where id_comportamento = 1 and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as demonstra_dificuldade, '
				.'(select count(*) from alunos where id_comportamento = 2 and id_turma="'.$turma.'" and codcur="'.$codcur.'" and codper="'.$codper.'") as em_aquisicao, '
				.'(select count(*) from alunos where id_comportamento = 3 and id_turma="'.$turma.'" and  codcur="'.$codcur.'" and codper="'.$codper.'") as bom_desempenho'
			);
			$this->db->where('id_turma', $turma);
			$this->db->where('codcur', $codcur);
			$this->db->where('codper', $codper);

			return $this->db->get('alunos')->row();
		}else{
			$this->db->select(''
			.'count(*)as total_alunos,'
			.'(select count(*) from alunos where vet_nov="vet" and codcur="'.$codcur.'" and codper="'.$codper.'") as veteranos,'
			.'(select count(*) from alunos where vet_nov="nov" and codcur="'.$codcur.'" and codper="'.$codper.'") as novatos,'
			.'(select count(*) from alunos where sexo="m" and codcur="'.$codcur.'" and codper="'.$codper.'") as masculino,'
			.'(select count(*) from alunos where sexo="f" and codcur="'.$codcur.'" and codper="'.$codper.'") as feminino, '
			.'(select count(*) from alunos where id_turma=0 and codcur="'.$codcur.'" and codper="'.$codper.'") as sem_turma,'
			.'(select count(*) from alunos where media <=70 and codcur="'.$codcur.'" and codper="'.$codper.'" ) as media_70,'
			.'(select count(*) from alunos where (media > 70 and media <= 80)  and codcur="'.$codcur.'" and codper="'.$codper.'" ) as media_80,'
			.'(select count(*) from alunos where media > 80 and codcur="'.$codcur.'" and codper="'.$codper.'" ) as media_100, '
			.'(select count(*) from alunos where nee = 1 and codcur="'.$codcur.'" and codper="'.$codper.'") as nee, '
			.'(select count(*) from alunos where id_comportamento = 1 and codcur="'.$codcur.'" and codper="'.$codper.'") as demonstra_dificuldade,'
			.'(select count(*) from alunos where id_comportamento = 2 and codcur="'.$codcur.'" and codper="'.$codper.'") as em_aquisicao,'
			.'(select count(*) from alunos where id_comportamento = 3 and codcur="'.$codcur.'" and codper="'.$codper.'") as bom_desempenho'
		);
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);
		return $this->db->get('alunos')->row();
		}
	}




}

