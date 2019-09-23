<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas_model extends CI_Model {

	public function delete($codcur, $codper, $id_turma)
	{
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);	
		$this->db->where('id_turma', $id_turma);
		return $this->db->delete('turmas');
	}

	public function reset_all($codcur, $codper)
	{	
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);
		$this->db->where('id_turma', $id_turma);

		return $this->db->delete('turmas');
	}

	public function select_nome($nome)
	{
		$this->db->where('nome_turma', $nome);
		return $this->db->get('turmas')->row();
	}	

	public function select_where($dados)
	{
		$this->db->where($dados);
		return $this->db->get('turmas')->result();
	}

	public function select($codcur=null, $codper=null)
	{	
		$this->db->select(''
			.'id_turma, nome_turma, turno, '
			.'(select count(*) from alunos where id_turma = turmas.id_turma) as qtd'
		);
		$this->db->from('turmas');
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);
		$this->db->order_by('nome_turma', 'asc');
		return $this->db->get()->result();
	}	
	
	public function select_id($id='')
	{
		$this->db->where('id_turma', $id);
		return $this->db->get('turmas')->row();
	}	

	public function insert($dados='')
	{
		$this->db->insert('turmas', $dados);
		return $this->db->insert_id();
	}
	public function update($dados='', $id='')
	{	
		$this->db->where('id_turma', $id);
		return $this->db->update('turmas', $dados);
	}

	public function select_num_turmas($curso=null)
	{	
		$this->db->select('count(*) as turmas');
		$this->db->where('curso', $curso);
		return $this->db->get('turmas')->row();
	}

}

/* End of file Turmas_model.php */
/* Location: ./application/models/Turmas_model.php */

 ?>