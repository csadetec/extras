<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $usuarios = 'usuarios';

	public function select_login($dados)
	{
		$this->db->select('u.id_usuario, u.nome, u.usuario, p.nome_perfil');
		$this->db->from('usuarios as u');
		$this->db->join('perfis as p', 'u.id_perfil = p.id_perfil');
		$this->db->where($dados);
		return $this->db->get()->row();
	}

	public function insert($dados)
	{
		$this->db->insert('usuarios', $dados);
		return $this->db->insert_id();

	}

	public function select()
	{
		$this->db->select('u.id_usuario, u.nome, u.usuario, '
			.'p.nome_perfil'
		);
		$this->db->order_by('nome', 'asc');
		$this->db->from('usuarios as u');
		$this->db->join('perfis as p', 'u.id_perfil = p.id_perfil');
		return $this->db->get()->result();
	}

	public function select_id($id = null){
		$this->db->select('u.id_usuario, u.nome, u.usuario, u.id_perfil, '
		.'p.nome_perfil'
		);
		$this->db->from('usuarios as u');
		$this->db->join('perfis as p', 'p.id_perfil = u.id_perfil');
		
		$this->db->where('id_usuario', $id);
		return $this->db->get()->row();
	}

	public function update($dados, $id){
		$this->db->where('id_usuario', $id);
		return $this->db->update('usuarios', $dados);
	}

}
