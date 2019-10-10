<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios_model extends CI_Model {


	public function select()
	{
		$this->db->select('c.chapa, c.nome_colaborador, '
			.'sc.id_motivo, sc.diferenca, sc.id_servico, date_format(sc.data, "%d/%m/%Y") as data, '
			.'m.nome_motivo'
		);
		$this->db->from('servicos_colaboradores as sc');
		$this->db->join('colaboradores as c', 'sc.chapa = c.chapa');
		$this->db->join('motivos as m', 'm.id_motivo = sc.id_motivo');
		$this->db->order_by('c.nome_colaborador', 'asc');
		return $this->db->get()->result();
	}

	public function select_distinct_colaboradores()
	{	
		$this->db->select('distinct(sc.chapa), c.nome_colaborador, c.cargo');
		$this->db->from('servicos_colaboradores as sc');
		$this->db->join('colaboradores as c', 'sc.chapa = c.chapa');
		$this->db->order_by('c.nome_colaborador', 'asc');
		return $this->db->get()->result();
	
	}






}

