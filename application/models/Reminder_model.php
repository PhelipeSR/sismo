<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function existeEmail($email){

		$this->db->select('id');
		$this->db->where('email',$email);
		$query = $this->db->get('usuario');
		if ($query->num_rows() > 0) {
			return $query->row()->id;
		}else{
			return FALSE;
		}
	}

	function existeToken($token){

		$this->db->select('usuario_id');
		$this->db->where('token',$token);
		$this->db->where('data_expiracao >=',date('Y-m-d H:i:s'));
		$query = $this->db->get('recuperacao');
		if ($query->num_rows() > 0) {
			return $query->row()->usuario_id;
		}else{
			return FALSE;
		}
	}

	function existeId($id){

		$this->db->select('id');
		$this->db->where('usuario_id',$id);
		$query = $this->db->get('recuperacao');
		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function updateSenha($dados){

		$this->db->where('id', $dados['id']);
		if ($this->db->update('usuario',$dados)) {
			//Deleta o token da tabela recuperação
			$this->db->where('usuario_id', $dados['id']);
			$this->db->delete('recuperacao');
			return TRUE;
		}else{
			return FALSE;
		}
	}
}