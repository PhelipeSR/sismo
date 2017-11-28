<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function logar($dados){
		$this->db->select( '*' );
		$this->db->where('email', $dados['email']);

		$query = $this->db->get('usuario');

		if ($query->num_rows() == 1) {
			$row = $query->row_array();
			if (password_verify( $dados['senha'], $row['hash'])) {
				return $row;
			}
			return FALSE;
		}
		return FALSE;
	}
}