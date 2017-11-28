<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function addUsuario($dados){

		if ($this->db->insert('usuario', $dados))
			return TRUE;
		else
			return FALSE;
	}

	function editUsuario($dados,$id){
		$this->db->where('id', $id);
		if ($this->db->update('usuario',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteUsuario($id) {

		$this->db->where('id', $id);
		if ($this->db->delete('usuario')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function checkUsuario($id, $senha) {
		$this->db->select( 'hash' );
		$this->db->where('id', $id);

		$query = $this->db->get('usuario');

		if ($query->num_rows() == 1) {
			$row = $query->row_array();
			if (password_verify( $senha, $row['hash'])) {
				return TRUE;
			}
			return FALSE;
		}
		return FALSE;
	}
}