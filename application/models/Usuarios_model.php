<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $usuarios = 'usuarios';

	public function select_teste()
	{
		$this->db->select('id_usuario, nome, senha');
		$this->db->from($this->usuarios);
		return $this->db->get()->result();
	}

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
		$this->db->order_by('nome', 'asc');

		return $this->db->get('usuarios')->result();
	}

	public function select_id($id = null){
		$this->db->where('id_usuario', $id);
		return $this->db->get('usuarios')->row();
	}

	public function update($id, $dados){
		$this->db->where('id_usuario', $id);
		return $this->db->update('usuarios', $dados);
	}

}
